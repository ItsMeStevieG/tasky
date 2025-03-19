<?php

namespace Itsmestevieg\Tasky;

class Project
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add($name, $client = '', $hourly_rate = null)
    {
        $stmt = $this->pdo->prepare("INSERT INTO projects (name, client, hourly_rate) VALUES (:name, :client, :hourly_rate)");
        $stmt->execute(['name' => $name, 'client' => $client, 'hourly_rate' => $hourly_rate]);
        return $this->pdo->lastInsertId();
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM projects ORDER BY name");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUniqueClients()
    {
        $stmt = $this->pdo->query("SELECT DISTINCT client FROM projects WHERE client IS NOT NULL AND client != '' ORDER BY client");
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $client = '', $hourly_rate = null)
    {
        $stmt = $this->pdo->prepare("UPDATE projects SET name = :name, client = :client, hourly_rate = :hourly_rate WHERE id = :id");
        $stmt->execute(['id' => $id, 'name' => $name, 'client' => $client, 'hourly_rate' => $hourly_rate]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM projects WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
