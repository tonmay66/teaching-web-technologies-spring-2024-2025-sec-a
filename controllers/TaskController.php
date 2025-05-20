<?php
//require_once DIR . '/../models/Task.php';
include_once './tasks.php';
include_once './task_form.php';

class TaskController {
    private $taskModel;

    public function __construct($pdo) {
        $this->taskModel = new Task($pdo);
    }

    public function listTasks() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit;
        }

        $tasks = $this->taskModel->getTasksByUser($_SESSION['user_id']);
        header('location: ./tasks.php');
        //include DIR . '/../views/tasks.php';
    }

    public function createTask() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $due_date = $_POST['due_date'];
            $priority = $_POST['priority'];
            $category_id = $_POST['category_id'] ?? null;

            if (!$title ||  !$due_date || !$priority) {
                $error = "Please fill all required fields.";
                header('location: ./task_form.php');
               // include DIR . '/../views/task_form.php';
                return;
            }

            if ($this->taskModel->createTask($_SESSION['user_id'], $title, $description, $due_date, $priority, $category_id)) {
                header("Location: tasks.php");
                exit;
            } else {
                $error = "Failed to create task.";
                header('location: ./task_form.php');
                //include DIR . '/../views/task_form.php';
            }
        } else {
            header('location: ./task_form.php');

           // include DIR . '/../views/task_form.php';
        }
    }

    public function deleteTask() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit;
        }

        $task_id = $_GET['id'] ?? null;
        if ($task_id && $this->taskModel->deleteTask($task_id, $_SESSION['user_id'])) {
            header("Location: tasks.php");
            exit;
        } else {
            echo "Failed to delete task or invalid ID.";
        }
    }
}
?>