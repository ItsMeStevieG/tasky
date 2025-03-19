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

    public function getFullName()
    {
        return $_SESSION['full_name'] ?? '';
    }
}
