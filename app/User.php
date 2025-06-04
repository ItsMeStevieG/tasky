<?php

namespace Itsmestevieg\Tasky;

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add($username, $password, $full_name, $is_admin = false, $notify_pref = 'in-app')
    {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, full_name, is_admin, notify_pref) VALUES (:username, :password, :full_name, :is_admin, :notify_pref)");
        $stmt->execute([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'full_name' => $full_name,
            'is_admin' => $is_admin ? 1 : 0,
            'notify_pref' => $notify_pref
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM users ORDER BY username");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getNotifyPref($id)
    {
        $stmt = $this->pdo->prepare("SELECT notify_pref FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetchColumn();
    }

    public function update($id, $username, $full_name, $is_admin, $password = null, $notify_pref = null)
    {
        $params = ['id' => $id, 'username' => $username, 'full_name' => $full_name, 'is_admin' => $is_admin ? 1 : 0];
        $sql = "UPDATE users SET username = :username, full_name = :full_name, is_admin = :is_admin";

        if ($password) {
            $params['password'] = password_hash($password, PASSWORD_BCRYPT);
            $sql .= ", password = :password";
        }
        if ($notify_pref !== null) {
            $params['notify_pref'] = $notify_pref;
            $sql .= ", notify_pref = :notify_pref";
        }

        $sql .= " WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
