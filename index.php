<?php
// Custom error handler
set_error_handler(function ($severity, $message, $file, $line) {
    $log_file = __DIR__ . '/logs/php_errors.log';
    $log_message = sprintf(
        "[%s] [Severity: %s] %s in %s on line %d\n",
        date('Y-m-d H:i:s'),
        $severity,
        $message,
        $file,
        $line
    );
    file_put_contents($log_file, $log_message, FILE_APPEND);
    return false;
});

session_start();

require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'app/Auth.php';
require_once 'app/Project.php';
require_once 'app/Tag.php';
require_once 'app/Timesheet.php';
require_once 'app/Report.php';
require_once 'app/User.php';

use Itsmestevieg\Tasky\Auth;
use Itsmestevieg\Tasky\Project;
use Itsmestevieg\Tasky\Tag;
use Itsmestevieg\Tasky\Timesheet;
use Itsmestevieg\Tasky\Report;
use Itsmestevieg\Tasky\User;

// Initialize Twig
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, [
    'cache' => 'templates/cache', // Enable caching
    'auto_reload' => true,        // Recompile templates if they change
]);

$auth = new Auth($pdo);
$twig->addGlobal('auth', $auth);
$project = new Project($pdo);
$tag = new Tag($pdo);
$timesheet = new Timesheet($pdo);
$report = new Report($pdo);
$user = new User($pdo);
$nav = $_GET['nav'] ?? 'dashboard';
$error = null;
$success = null;

// Set the initial theme from cookie, default to system preference if not set
if (!isset($_COOKIE['theme'])) {
    setcookie('theme', 'system', time() + (365 * 24 * 60 * 60), "/"); // Cookie expires in 1 year
    $theme = 'system';
} else {
    $theme = $_COOKIE['theme'];
}

// Determine the theme to apply server-side
if ($theme === 'system') {
    // Default to light if we can't determine system preference server-side
    $theme = 'light';
}
$twig->addGlobal('theme', $theme);

// Handle theme toggle as a separate nav value
if ($nav === 'toggle_theme' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme = $_POST['theme'] ?? 'light';
    setcookie('theme', $theme, time() + (365 * 24 * 60 * 60), "/"); // Update cookie
    // Return a JSON response for AJAX
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success', 'theme' => $theme]);
    exit;
}

if ($nav === 'login') {
    if ($auth->isLoggedIn()) {
        header("Location: index.php?nav=dashboard");
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            if (empty($username) || empty($password)) {
                $error = "Username and password are required.";
            } elseif ($auth->login($username, $password)) {
                session_regenerate_id(true); // Regenerate session ID after login
                header("Location: index.php?nav=dashboard");
                exit;
            } else {
                $error = "Invalid credentials";
            }
        }
    }
    echo $twig->render('pages/login.twig', ['error' => $error]);
} elseif ($nav === 'dashboard') {
    $auth->requireLogin();
    $page = max(1, (int)($_GET['page'] ?? 1));
    $perPage = 10;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_entry') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $project_id = $_POST['project_id'] ?? '';
            $tag_id = $_POST['tag_id'] ?? null;
            $date = $_POST['date'] ?? '';
            $start_time = $_POST['start_time'] ?? '';
            $end_time = $_POST['end_time'] ?? '';
            $description = $_POST['description'] ?? '';
            $is_billable = isset($_POST['is_billable']);
            if (empty($project_id) || empty($date) || empty($start_time) || empty($end_time)) {
                $error = "Project, date, start time, and end time are required.";
            } else {
                $timesheet->add(
                    $_SESSION['user_id'],
                    $project_id,
                    $tag_id,
                    $date,
                    $start_time,
                    $end_time,
                    $description,
                    $is_billable
                );
                $success = "Entry added successfully.";
            }
        }
    }
    $projects = $project->getAll();
    $tags = $tag->getAll();
    $entries = $timesheet->getUserEntriesPaginated($_SESSION['user_id'], $page, $perPage);
    $totalEntries = $timesheet->getUserEntriesCount($_SESSION['user_id']);
    $totalPages = max(1, ceil($totalEntries / $perPage));
    echo $twig->render('pages/dashboard.twig', [
        'full_name' => $auth->getFullName(),
        'projects' => $projects,
        'tags' => $tags,
        'entries' => $entries,
        'current_page' => $page,
        'total_pages' => $totalPages,
        'total_hours' => array_sum(array_column($entries, 'hours_worked')),
        'error' => $error,
        'success' => $success
    ]);
} elseif ($nav === 'projects') {
    $auth->requireLogin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            if ($_POST['action'] === 'add_project') {
                $name = trim($_POST['name'] ?? '');
                $client = trim($_POST['client'] ?? '');
                if (empty($name)) {
                    $error = "Project name is required.";
                } else {
                    $project->add($name, $client);
                    $success = "Project added successfully.";
                }
            } elseif ($_POST['action'] === 'update_project') {
                $id = $_POST['id'] ?? null;
                $name = trim($_POST['name'] ?? '');
                $client = trim($_POST['client'] ?? '');
                if (!$id || empty($name)) {
                    $error = "Project ID and name are required.";
                } else {
                    $project->update($id, $name, $client);
                    $success = "Project updated successfully.";
                }
            } elseif ($_POST['action'] === 'delete_project') {
                $id = $_POST['id'] ?? null;
                if ($id) {
                    $project->delete($id);
                    $success = "Project deleted successfully.";
                } else {
                    $error = "Project ID is required.";
                }
            }
        }
    }
    $projects = $project->getAll();
    $unique_clients = $project->getUniqueClients();
    echo $twig->render('pages/projects.twig', [
        'full_name' => $auth->getFullName(),
        'projects' => $projects,
        'unique_clients' => $unique_clients,
        'error' => $error,
        'success' => $success
    ]);
} elseif ($nav === 'tags') {
    $auth->requireLogin();
    $page = max(1, (int)($_GET['page'] ?? 1));
    $perPage = 10;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            if ($_POST['action'] === 'add_tag') {
                $name = trim($_POST['name'] ?? '');
                if (empty($name)) {
                    $error = "Tag name is required.";
                } else {
                    $tag->add($name);
                    $success = "Tag added successfully.";
                }
            } elseif ($_POST['action'] === 'update_tag') {
                $id = $_POST['id'] ?? null;
                $name = trim($_POST['name'] ?? '');
                if (!$id || empty($name)) {
                    $error = "Tag ID and name are required.";
                } else {
                    $tag->update($id, $name);
                    $success = "Tag updated successfully.";
                }
            } elseif ($_POST['action'] === 'delete_tag') {
                $id = $_POST['id'] ?? null;
                if ($id) {
                    $tag->delete($id);
                    $success = "Tag added successfully.";
                } else {
                    $error = "Tag ID is required.";
                }
            }
        }
    }
    $tags = $tag->getPaginated($page, $perPage);
    $totalTags = $tag->getTotalCount();
    $totalPages = max(1, ceil($totalTags / $perPage));
    echo $twig->render('pages/tags.twig', [
        'full_name' => $auth->getFullName(),
        'tags' => $tags,
        'current_page' => $page,
        'total_pages' => $totalPages,
        'error' => $error,
        'success' => $success
    ]);
} elseif ($nav === 'edit_entry') {
    $auth->requireLogin();
    $id = $_GET['id'] ?? null;
    if (!$id || !($entry = $timesheet->getEntry($id, $_SESSION['user_id']))) {
        header("Location: index.php?nav=dashboard");
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update_entry') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $project_id = $_POST['project_id'] ?? '';
            $tag_id = $_POST['tag_id'] ?? null;
            $date = $_POST['date'] ?? '';
            $start_time = $_POST['start_time'] ?? '';
            $end_time = $_POST['end_time'] ?? '';
            $description = $_POST['description'] ?? '';
            $is_billable = isset($_POST['is_billable']);
            if (empty($project_id) || empty($date) || empty($start_time) || empty($end_time)) {
                $error = "Project, date, start time, and end time are required.";
            } else {
                $timesheet->update(
                    $id,
                    $_SESSION['user_id'],
                    $project_id,
                    $tag_id,
                    $date,
                    $start_time,
                    $end_time,
                    $description,
                    $is_billable
                );
                header("Location: index.php?nav=dashboard");
                exit;
            }
        }
    }
    $projects = $project->getAll();
    $tags = $tag->getAll();
    echo $twig->render('pages/edit_entry.twig', [
        'full_name' => $auth->getFullName(),
        'entry' => $entry,
        'projects' => $projects,
        'tags' => $tags,
        'error' => $error
    ]);
} elseif ($nav === 'delete_entry') {
    $auth->requireLogin();
    $id = $_GET['id'] ?? null;
    if ($id) {
        $timesheet->delete($id, $_SESSION['user_id']);
    }
    header("Location: index.php?nav=dashboard");
    exit;
} elseif ($nav === 'reports') {
    $auth->requireLogin();
    $start_date = $_GET['start_date'] ?? date('Y-m-d', strtotime('-30 days'));
    $end_date = $_GET['end_date'] ?? date('Y-m-d');
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && (!empty($_GET['start_date']) || !empty($_GET['end_date']))) {
        $csrf_token = $_GET['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            if (empty($_GET['start_date']) || empty($_GET['end_date'])) {
                $error = "Both start date and end date are required.";
            } elseif (strtotime($_GET['start_date']) > strtotime($_GET['end_date'])) {
                $error = "Start date must be before end date.";
            } else {
                $start_date = $_GET['start_date'];
                $end_date = $_GET['end_date'];
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['export_csv'])) {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $start_date = $_POST['start_date'] ?? date('Y-m-d', strtotime('-30 days'));
            $end_date = $_POST['end_date'] ?? date('Y-m-d');
            $reports = $report->getHoursByProject($_SESSION['user_id'], $start_date, $end_date);

            // Generate CSV
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="report-' . date('Y-m-d') . '.csv"');
            header('Cache-Control: no-cache, no-store, must-revalidate');
            header('Pragma: no-cache');
            header('Expires: 0');

            $output = fopen('php://output', 'w');
            fputcsv($output, ['Project', 'Total Hours']); // CSV headers
            foreach ($reports as $report) {
                fputcsv($output, [
                    $report['project_name'] ?: 'No Project',
                    number_format($report['total_hours'], 2)
                ]);
            }
            fclose($output);
            exit;
        }
    }
    $reports = $report->getHoursByProject($_SESSION['user_id'], $start_date, $end_date);
    echo $twig->render('pages/reports.twig', [
        'full_name' => $auth->getFullName(),
        'reports' => $reports,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'error' => $error
    ]);
} elseif ($nav === 'users') {
    $auth->requireAdmin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_user') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            $full_name = trim($_POST['full_name'] ?? '');
            $is_admin = isset($_POST['is_admin']);
            if (empty($username) || empty($password) || empty($full_name)) {
                $error = "Username, password, and full name are required.";
            } else {
                try {
                    $user->add($username, $password, $full_name, $is_admin);
                } catch (\PDOException $e) {
                    $error = "Error adding user: " . $e->getMessage();
                }
            }
        }
    }
    $users = $user->getAll();
    echo $twig->render('pages/users.twig', [
        'full_name' => $auth->getFullName(),
        'users' => $users,
        'error' => $error
    ]);
} elseif ($nav === 'edit_user') {
    $auth->requireAdmin();
    $id = $_GET['id'] ?? null;
    if (!$id || !($user_data = $user->getById($id))) {
        header("Location: index.php?nav=users");
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update_user') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            $full_name = trim($_POST['full_name'] ?? '');
            $is_admin = isset($_POST['is_admin']);
            if (empty($username) || empty($full_name)) {
                $error = "Username and full name are required.";
            } else {
                try {
                    $user->update($id, $username, $full_name, $is_admin, $password ?: null);
                    header("Location: index.php?nav=users");
                    exit;
                } catch (\PDOException $e) {
                    $error = "Error updating user: " . $e->getMessage();
                }
            }
        }
    }
    echo $twig->render('pages/edit_user.twig', [
        'full_name' => $auth->getFullName(),
        'user' => $user_data,
        'error' => $error
    ]);
} elseif ($nav === 'delete_user') {
    $auth->requireAdmin();
    $id = $_GET['id'] ?? null;
    if ($id && $id != $_SESSION['user_id']) { // Prevent self-deletion
        $user->delete($id);
    }
    header("Location: index.php?nav=users");
    exit;
} elseif ($nav === 'profile') {
    $auth->requireLogin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'update_profile') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $full_name = trim($_POST['full_name'] ?? '');
            $password = $_POST['password'] ?? '';
            $profile_picture = null;

            if (empty($full_name)) {
                $error = "Full name is required.";
            } else {
                // Handle profile picture upload
                if (!empty($_POST['cropped_image'])) {
                    $upload_dir = 'uploads/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
                    $base64_image = $_POST['cropped_image'];
                    $image_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64_image));
                    $filename = uniqid() . '.jpg';
                    $upload_path = $upload_dir . $filename;
                    if (file_put_contents($upload_path, $image_data)) {
                        $profile_picture = $upload_path;
                    } else {
                        $error = "Failed to save cropped profile picture.";
                    }
                } elseif (!empty($_FILES['profile_picture']['name'])) {
                    $upload_dir = 'uploads/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir, 0777, true);
                    }
                    $ext = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
                    $filename = uniqid() . '.' . $ext;
                    $upload_path = $upload_dir . $filename;
                    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_path)) {
                        $profile_picture = $upload_path;
                    } else {
                        $error = "Failed to upload profile picture.";
                    }
                }

                if (!$error) {
                    $auth->updateProfile($_SESSION['user_id'], $full_name, $password ?: null, $profile_picture);
                }
            }
        }
    }
    echo $twig->render('pages/profile.twig', [
        'full_name' => $auth->getFullName(),
        'error' => $error
    ]);
} elseif ($nav === 'logout') {
    $auth->logout();
    header("Location: index.php?nav=login");
    exit;
} else {
    $auth->requireLogin();
    $page = max(1, (int)($_GET['page'] ?? 1));
    $perPage = 10;
    $projects = $project->getAll();
    $tags = $tag->getAll();
    $entries = $timesheet->getUserEntriesPaginated($_SESSION['user_id'], $page, $perPage);
    $totalEntries = $timesheet->getUserEntriesCount($_SESSION['user_id']);
    $totalPages = max(1, ceil($totalEntries / $perPage));
    echo $twig->render('pages/dashboard.twig', [
        'full_name' => $auth->getFullName(),
        'projects' => $projects,
        'tags' => $tags,
        'entries' => $entries,
        'current_page' => $page,
        'total_pages' => $totalPages,
        'total_hours' => array_sum(array_column($entries, 'hours_worked')),
        'error' => $error
    ]);
}
