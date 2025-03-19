<?php

namespace Itsmestevieg\Tasky;

class Timesheet
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add($user_id, $project_id, $tag_id, $date, $start_time, $end_time, $description = '', $is_billable = false)
    {
        $start = new \DateTime("$date $start_time");
        $end = new \DateTime("$date $end_time");
        $interval = $start->diff($end);
        $hours_worked = $interval->h + ($interval->i / 60) + ($interval->s / 3600);

        $stmt = $this->pdo->prepare("INSERT INTO timesheet_entries (user_id, project_id, tag_id, date, start_time, end_time, hours_worked, description, is_billable) VALUES (:user_id, :project_id, :tag_id, :date, :start_time, :end_time, :hours_worked, :description, :is_billable)");
        $stmt->execute([
            'user_id' => $user_id,
            'project_id' => $project_id,
            'tag_id' => $tag_id ?: null,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'hours_worked' => $hours_worked,
            'description' => $description,
            'is_billable' => $is_billable ? 1 : 0
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getUserEntriesPaginated($user_id, $page = 1, $perPage = 10)
    {
        $offset = ($page - 1) * $perPage;
        $stmt = $this->pdo->prepare("
            SELECT te.*, p.name AS project_name, t.name AS tag_name
            FROM timesheet_entries te
            LEFT JOIN projects p ON te.project_id = p.id
            LEFT JOIN tags t ON te.tag_id = t.id
            WHERE te.user_id = :user_id
            ORDER BY te.created_at DESC
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':user_id', $user_id, \PDO::PARAM_INT);
        $stmt->bindValue(':limit', $perPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getUserEntriesCount($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM timesheet_entries WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchColumn();
    }

    public function getUserEntries($user_id)
    {
        $stmt = $this->pdo->prepare("
            SELECT te.*, p.name AS project_name, t.name AS tag_name
            FROM timesheet_entries te
            LEFT JOIN projects p ON te.project_id = p.id
            LEFT JOIN tags t ON te.tag_id = t.id
            WHERE te.user_id = :user_id
            ORDER BY te.created_at DESC
        ");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getEntry($id, $user_id)
    {
        $stmt = $this->pdo->prepare("
            SELECT te.*, p.name AS project_name, t.name AS tag_name
            FROM timesheet_entries te
            LEFT JOIN projects p ON te.project_id = p.id
            LEFT JOIN tags t ON te.tag_id = t.id
            WHERE te.id = :id AND te.user_id = :user_id
        ");
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $user_id, $project_id, $tag_id, $date, $start_time, $end_time, $description = '', $is_billable = false)
    {
        $start = new \DateTime("$date $start_time");
        $end = new \DateTime("$date $end_time");
        $interval = $start->diff($end);
        $hours_worked = $interval->h + ($interval->i / 60) + ($interval->s / 3600);

        $stmt = $this->pdo->prepare("
            UPDATE timesheet_entries
            SET project_id = :project_id, tag_id = :tag_id, date = :date, start_time = :start_time, end_time = :end_time, hours_worked = :hours_worked, description = :description, is_billable = :is_billable
            WHERE id = :id AND user_id = :user_id
        ");
        $stmt->execute([
            'project_id' => $project_id,
            'tag_id' => $tag_id ?: null,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'hours_worked' => $hours_worked,
            'description' => $description,
            'is_billable' => $is_billable ? 1 : 0,
            'id' => $id,
            'user_id' => $user_id
        ]);
    }

    public function delete($id, $user_id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM timesheet_entries WHERE id = :id AND user_id = :user_id");
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
    }
}
