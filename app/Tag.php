<?php

namespace Itsmestevieg\Tasky;

class Tag
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add($name)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tags (name) VALUES (:name)");
        $stmt->execute(['name' => $name]);
        return $this->pdo->lastInsertId();
    }

    public function getPaginated($page = 1, $perPage = 10)
    {
        $offset = ($page - 1) * $perPage;
        $stmt = $this->pdo->prepare("SELECT * FROM tags ORDER BY name LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $perPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTotalCount()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM tags");
        return $stmt->fetchColumn();
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM tags ORDER BY name");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tags WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $name)
    {
        $stmt = $this->pdo->prepare("UPDATE tags SET name = :name WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tags WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
