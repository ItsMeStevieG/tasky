<?php
namespace Itsmestevieg\Tasky;

class Notification
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add($user_id, $message)
    {
        $stmt = $this->pdo->prepare("INSERT INTO notifications (user_id, message) VALUES (:user_id, :message)");
        $stmt->execute(['user_id' => $user_id, 'message' => $message]);
    }

    public function addIfNotExists($user_id, $message)
    {
        $check = $this->pdo->prepare("SELECT id FROM notifications WHERE user_id = :user_id AND message = :message AND is_read = 0");
        $check->execute(['user_id' => $user_id, 'message' => $message]);
        if (!$check->fetchColumn()) {
            $this->add($user_id, $message);
        }
    }

    public function getUnread($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM notifications WHERE user_id = :user_id AND is_read = 0 ORDER BY created_at DESC");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAll($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM notifications WHERE user_id = :user_id ORDER BY created_at DESC");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function markRead($id, $user_id)
    {
        $stmt = $this->pdo->prepare("UPDATE notifications SET is_read = 1 WHERE id = :id AND user_id = :user_id");
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
    }
}
?>
