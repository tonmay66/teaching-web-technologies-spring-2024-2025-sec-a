<?php
class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function createTask($user_id, $title, $description, $due_date, $priority, $category_id) {
        $stmt = $this->pdo->prepare("INSERT INTO tasks (user_id, title, description, due_date, priority, category_id, status) VALUES (?, ?, ?, ?, ?, ?, 0)");
        return $stmt->execute([$user_id, $title, $description, $due_date, $priority, $category_id]);
    }

    public function getTasksByUser($user_id) {
        $stmt = $this->pdo->prepare("SELECT t.*, c.name AS category_name FROM tasks t LEFT JOIN categories c ON t.category_id = c.id WHERE t.user_id = ? ORDER BY t.due_date ASC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll();
    }

    public function getTaskById($task_id, $user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = ? AND user_id = ?");
        $stmt->execute([$task_id, $user_id]);
        return $stmt->fetch();
    }

    public function updateTask($task_id, $user_id, $title, $description, $due_date, $priority, $category_id, $status) {
        $stmt = $this->pdo->prepare("UPDATE tasks SET title = ?, description = ?, due_date = ?, priority = ?, category_id = ?, status = ? WHERE id = ? AND user_id = ?");
        return $stmt->execute([$title, $description, $due_date, $priority, $category_id, $status, $task_id, $user_id]);
    }

    public function deleteTask($task_id, $user_id) {
        $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ? AND user_id = ?");
        return $stmt->execute([$task_id, $user_id]);
    }
}
?>