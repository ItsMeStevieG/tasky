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
        $hours_worked = $interval->h + ($interval->i / 60);

        $stmt = $this->pdo->prepare("INSERT INTO timesheet_entries (user_id, project_id, tag_id, date, start_time, end_time, hours_worked, description, is_billable) VALUES (:user_id, :project_id, :tag_id, :date, :start_time, :end_time, :hours_worked, :description, :is_billable)");
        $stmt->execute([
            'user_id' => $user_id,
            'project_id' => $project_id,
            'tag_id' => $tag_id,
            'date' => $date,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'hours_worked' => $hours_worked,
            'description' => $description,
            'is_billable' => $is_billable ? 1 : 0
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getUserEntries($user_id)
    {
        $stmt = $this->pdo->prepare("SELECT te.*, p.name as project_name, t.name as tag_name FROM timesheet_entries te LEFT JOIN projects p ON te.project_id = p.id LEFT JOIN tags t ON te.tag_id = t.id WHERE te.user_id = :user_id ORDER BY te.date DESC");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getEntry($id, $user_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM timesheet_entries WHERE id = :id AND user_id = :user_id");
        $stmt->execute(['id' => $id, 'user_id' => $user_id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $user_id, $project_id, $tag_id, $date, $start_time, $end_time, $description, $is_billable)
    {
        $start = new \DateTime("$date $start_time");
        $end = new \DateTime("$date $end_time");
        $interval = $start->diff($end);
        $hours_worked = $interval->h + ($interval->i / 60);

        $stmt = $this->pdo->prepare("UPDATE timesheet_entries SET project_id = :project_id, tag_id = :tag_id, date = :date, start_time = :start_time, end_time = :end_time, hours_worked = :hours_worked, description = :description, is_billable = :is_billable WHERE id = :id AND user_id = :user_id");
        $stmt->execute([
            'project_id' => $project_id,
            'tag_id' => $tag_id,
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

    public function getWeeklyHours($user_id)
    {
        $startOfWeek = date('Y-m-d', strtotime('monday this week'));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week'));
        $stmt = $this->pdo->prepare("SELECT SUM(hours_worked) as total_hours FROM timesheet_entries WHERE user_id = :user_id AND date BETWEEN :start AND :end");
        $stmt->execute(['user_id' => $user_id, 'start' => $startOfWeek, 'end' => $endOfWeek]);
        return $stmt->fetch(\PDO::FETCH_ASSOC)['total_hours'] ?? 0;
    }
}
