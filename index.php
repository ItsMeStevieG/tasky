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
    // Return false to let PHP's default handler run (e.g., for display)
    return false;
});

session_start();
session_regenerate_id(true);

require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'app/Auth.php';
require_once 'app/Project.php';
require_once 'app/Tag.php';
require_once 'app/Timesheet.php';
require_once 'app/Report.php';

use Itsmestevieg\Tasky\Auth;
use Itsmestevieg\Tasky\Project;
use Itsmestevieg\Tasky\Tag;
use Itsmestevieg\Tasky\Timesheet;
use Itsmestevieg\Tasky\Report;

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
$auth = new Auth($pdo);
$twig->addGlobal('auth', $auth);
$project = new Project($pdo);
$tag = new Tag($pdo);
$timesheet = new Timesheet($pdo);
$report = new Report($pdo);
$nav = $_GET['nav'] ?? 'dashboard';
$error = null;

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
            }
        }
    }
    $projects = $project->getAll();
    $tags = $tag->getAll();
    $entries = $timesheet->getUserEntries($_SESSION['user_id']);
    echo $twig->render('pages/dashboard.twig', [
        'full_name' => $auth->getFullName(),
        'projects' => $projects,
        'tags' => $tags,
        'entries' => $entries,
        'error' => $error
    ]);
} elseif ($nav === 'projects') {
    $auth->requireLogin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_project') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $name = trim($_POST['name'] ?? '');
            $client = trim($_POST['client'] ?? '');
            if (empty($name)) {
                $error = "Project name is required.";
            } else {
                $project->add($name, $client);
            }
        }
    }
    $projects = $project->getAll();
    echo $twig->render('pages/projects.twig', [
        'full_name' => $auth->getFullName(),
        'projects' => $projects,
        'error' => $error
    ]);
} elseif ($nav === 'tags') {
    $auth->requireLogin();
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_tag') {
        $csrf_token = $_POST['csrf_token'] ?? '';
        if (!$auth->verifyCsrfToken($csrf_token)) {
            $error = "Invalid CSRF token.";
        } else {
            $name = trim($_POST['name'] ?? '');
            if (empty($name)) {
                $error = "Tag name is required.";
            } else {
                $tag->add($name);
            }
        }
    }
    $tags = $tag->getAll();
    echo $twig->render('pages/tags.twig', [
        'full_name' => $auth->getFullName(),
        'tags' => $tags,
        'error' => $error
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
    $reports = $report->getHoursByProject($_SESSION['user_id'], $start_date, $end_date);
    echo $twig->render('pages/reports.twig', [
        'full_name' => $auth->getFullName(),
        'reports' => $reports,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'error' => $error
    ]);
} elseif ($nav === 'logout') {
    $auth->logout();
    header("Location: index.php?nav=login");
    exit;
} else {
    $auth->requireLogin();
    $projects = $project->getAll();
    $tags = $tag->getAll();
    $entries = $timesheet->getUserEntries($_SESSION['user_id']);
    echo $twig->render('pages/dashboard.twig', [
        'full_name' => $auth->getFullName(),
        'projects' => $projects,
        'tags' => $tags,
        'entries' => $entries,
        'error' => $error
    ]);
}
