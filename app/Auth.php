<?php

namespace Itsmestevieg\Tasky;

class Auth
{
    private $pdo;
    private static $tokenInitialized = false;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        if (!self::$tokenInitialized) {
            if (empty($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }
            self::$tokenInitialized = true;
        }
    }

    public function getCsrfToken()
    {
        return $_SESSION['csrf_token'];
    }

    public function verifyCsrfToken($token)
    {
        return hash_equals($_SESSION['csrf_token'], $token);
    }

    public function login($username, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['is_admin'] = $user['is_admin'];
            $_SESSION['profile_picture'] = $user['profile_picture'];
            return true;
        }
        return false;
    }

    public function logout()
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
        }
        session_destroy();
        session_start();
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public function requireLogin()
    {
        if (!$this->isLoggedIn()) {
            header("Location: index.php?nav=login");
            exit;
        }
    }

    public function isAdmin()
    {
        return $this->isLoggedIn() && isset($_SESSION['is_admin']) && $_SESSION['is_admin'];
    }

    public function requireAdmin()
    {
        if (!$this->isAdmin()) {
            header("Location: index.php?nav=dashboard");
            exit;
        }
    }

    public function getFullName()
    {
        return $_SESSION['full_name'] ?? '';
    }

    public function getProfilePicture()
    {
        return $_SESSION['profile_picture'] ?? null;
    }

    public function updateProfile($user_id, $full_name, $password = null, $profile_picture = null)
    {
        $params = ['full_name' => $full_name, 'user_id' => $user_id];
        $sql = "UPDATE users SET full_name = :full_name";

        if ($password) {
            $params['password'] = password_hash($password, PASSWORD_BCRYPT);
            $sql .= ", password = :password";
        }
        if ($profile_picture) {
            $params['profile_picture'] = $profile_picture;
            $sql .= ", profile_picture = :profile_picture";
        }

        $sql .= " WHERE id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        // Update session
        $_SESSION['full_name'] = $full_name;
        if ($profile_picture) {
            $_SESSION['profile_picture'] = $profile_picture;
        }
    }
}
