<?php

namespace Itsmestevieg\Tasky;

class Report
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getHoursByProject($user_id, $start_date = null, $end_date = null)
    {
        $sql = "SELECT p.name as project_name, SUM(te.hours_worked) as total_hours 
            FROM timesheet_entries te 
            LEFT JOIN projects p ON te.project_id = p.id 
            WHERE te.user_id = :user_id";
        $params = ['user_id' => $user_id];

        if ($start_date) {
            $sql .= " AND te.date >= :start_date";
            $params['start_date'] = $start_date;
        }
        if ($end_date) {
            $sql .= " AND te.date <= :end_date";
            $params['end_date'] = $end_date;
        }

        $sql .= " GROUP BY p.id, p.name ORDER BY p.name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
