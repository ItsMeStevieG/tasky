<?php

namespace Itsmestevieg\Tasky;

class Task
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function add($project_id, $title, $description, $notes, $due_date, $assignee_id, $priority = 'medium', $recurrence = 'none', $reminder_days = null)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO tasks (project_id, title, description, notes, due_date, assignee_id, priority, recurrence, reminder_days)"
            . " VALUES (:project_id, :title, :description, :notes, :due_date, :assignee_id, :priority, :recurrence, :reminder_days)"
        );
        $stmt->execute([
            'project_id' => $project_id ?: null,
            'title' => $title,
            'description' => $description,
            'notes' => $notes,
            'due_date' => $due_date ?: null,
            'assignee_id' => $assignee_id ?: null,
            'priority' => $priority,
            'recurrence' => $recurrence,
            'reminder_days' => $reminder_days
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getAll()
    {
        $this->applyRecurrence();
        $stmt = $this->pdo->query(
            "SELECT tasks.*, projects.name AS project_name, users.full_name AS assignee_name,
                    st.parent_id, pt.title AS parent_title
             FROM tasks
             LEFT JOIN projects ON tasks.project_id = projects.id
             LEFT JOIN users ON tasks.assignee_id = users.id
             LEFT JOIN subtasks st ON st.task_id = tasks.id
             LEFT JOIN tasks pt ON st.parent_id = pt.id
             ORDER BY tasks.due_date"
        );
        $tasks = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($tasks as &$task) {
            $task['dependencies'] = $this->getDependencies($task['id']);
            $task['files'] = $this->getFiles($task['id']);
        }
        return $tasks;
    }

    public function getById($id)
    {
        $this->applyRecurrence();
        $stmt = $this->pdo->prepare(
            "SELECT tasks.*, projects.name AS project_name, users.full_name AS assignee_name,
                    st.parent_id, pt.title AS parent_title
             FROM tasks
             LEFT JOIN projects ON tasks.project_id = projects.id
             LEFT JOIN users ON tasks.assignee_id = users.id
             LEFT JOIN subtasks st ON st.task_id = tasks.id
             LEFT JOIN tasks pt ON st.parent_id = pt.id
             WHERE tasks.id = :id"
        );
        $stmt->execute(['id' => $id]);
        $task = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($task) {
            $task['dependencies'] = $this->getDependencies($id);
            $task['files'] = $this->getFiles($id);
        }
        return $task;
    }

    public function update($id, $project_id, $title, $description, $notes, $due_date, $assignee_id, $priority = 'medium', $recurrence = 'none', $reminder_days = null)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE tasks SET project_id = :project_id, title = :title, description = :description, notes = :notes,
             due_date = :due_date, assignee_id = :assignee_id, priority = :priority, recurrence = :recurrence, reminder_days = :reminder_days WHERE id = :id"
        );
        $stmt->execute([
            'project_id' => $project_id ?: null,
            'title' => $title,
            'description' => $description,
            'notes' => $notes,
            'due_date' => $due_date ?: null,
            'assignee_id' => $assignee_id ?: null,
            'priority' => $priority,
            'recurrence' => $recurrence,
            'reminder_days' => $reminder_days,
            'id' => $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function setParent($task_id, $parent_id = null)
    {
        $this->pdo->prepare("DELETE FROM subtasks WHERE task_id = ?")->execute([$task_id]);
        if ($parent_id) {
            $stmt = $this->pdo->prepare("INSERT INTO subtasks (task_id, parent_id) VALUES (:task_id, :parent_id)");
            $stmt->execute(['task_id' => $task_id, 'parent_id' => $parent_id]);
        }
    }

    public function setDependencies($task_id, array $deps)
    {
        $this->pdo->prepare("DELETE FROM task_dependencies WHERE task_id = ?")->execute([$task_id]);
        $stmt = $this->pdo->prepare("INSERT INTO task_dependencies (task_id, depends_on) VALUES (:task_id, :dep)");
        foreach ($deps as $dep) {
            if ($dep) {
                $stmt->execute(['task_id' => $task_id, 'dep' => $dep]);
            }
        }
    }

    public function getDependencies($task_id)
    {
        $stmt = $this->pdo->prepare("SELECT depends_on FROM task_dependencies WHERE task_id = :task_id");
        $stmt->execute(['task_id' => $task_id]);
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function addFile($task_id, $file_path)
    {
        $stmt = $this->pdo->prepare("INSERT INTO task_files (task_id, file_path) VALUES (:task_id, :file_path)");
        $stmt->execute(['task_id' => $task_id, 'file_path' => $file_path]);
    }

    public function getFiles($task_id)
    {
        $stmt = $this->pdo->prepare("SELECT file_path FROM task_files WHERE task_id = :task_id");
        $stmt->execute(['task_id' => $task_id]);
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function applyRecurrence()
    {
        $stmt = $this->pdo->query("SELECT id, due_date, recurrence FROM tasks WHERE recurrence <> 'none' AND due_date IS NOT NULL");
        $today = date('Y-m-d');
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $next = $row['due_date'];
            while ($next < $today) {
                if ($row['recurrence'] === 'daily') {
                    $next = date('Y-m-d', strtotime($next . ' +1 day'));
                } elseif ($row['recurrence'] === 'weekly') {
                    $next = date('Y-m-d', strtotime($next . ' +1 week'));
                } elseif ($row['recurrence'] === 'monthly') {
                    $next = date('Y-m-d', strtotime($next . ' +1 month'));
                } else {
                    break;
                }
            }
            if ($next !== $row['due_date']) {
                $upd = $this->pdo->prepare("UPDATE tasks SET due_date = :due_date WHERE id = :id");
                $upd->execute(['due_date' => $next, 'id' => $row['id']]);
            }
        }
    }

    public function getDueSoon($days = 1)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE due_date IS NOT NULL AND reminder_days IS NOT NULL AND DATEDIFF(due_date, CURDATE()) <= reminder_days AND DATEDIFF(due_date, CURDATE()) >= 0 ORDER BY due_date");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
