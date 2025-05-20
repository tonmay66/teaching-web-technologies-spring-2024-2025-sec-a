<?php
class Task {
    private $conn;

    public function __construct() {
        // Adjust DB credentials as needed
        $this->conn = new mysqli('localhost', 'root', '', 'task_management_db');

        if ($this->conn->connect_error) {
            die('Database connection error: ' . $this->conn->connect_error);
        }
    }

    // Get all tasks (sorted by due date)
    public function getAllTasks() {
        $result = $this->conn->query("SELECT * FROM tasks ORDER BY due_date ASC");
        $tasks = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $tasks[] = $row;
            }
        }
        return $tasks;
    }

    // Get task by ID
    public function getTaskById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Add a new task (no ID included, it auto-generates)
    public function addTask($description, $due_date, $priority, $category) {
        $stmt = $this->conn->prepare("INSERT INTO tasks (description, due_date, priority, category) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $description, $due_date, $priority, $category);
        return $stmt->execute();
    }

    // Update a task
    public function updateTask($id, $description, $due_date, $priority, $category) {
        $stmt = $this->conn->prepare("UPDATE tasks SET description = ?, due_date = ?, priority = ?, category = ? WHERE id = ?");
        $stmt->bind_param('ssssi', $description, $due_date, $priority, $category, $id);
        return $stmt->execute();
    }

    // Delete a task
    public function deleteTask($id) {
        $stmt = $this->conn->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
