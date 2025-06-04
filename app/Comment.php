<?php

namespace Itsmestevieg\Tasky;

class Comment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add($entry_id, $user_id, $comment)
    {
        $stmt = $this->pdo->prepare("INSERT INTO comments (entry_id, user_id, comment) VALUES (:entry_id, :user_id, :comment)");
        $stmt->execute([
            'entry_id' => $entry_id,
            'user_id' => $user_id,
            'comment' => $comment
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getByEntry($entry_id)
    {
        $stmt = $this->pdo->prepare("SELECT c.*, u.full_name FROM comments c JOIN users u ON c.user_id = u.id WHERE c.entry_id = :entry_id ORDER BY c.created_at ASC");
        $stmt->execute(['entry_id' => $entry_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($id, $user_id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM comments WHERE id = :id AND user_id = :user_id");
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
    }
}
