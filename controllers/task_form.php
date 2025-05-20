<!DOCTYPE html>
<html>
<head>
<title><?php echo isset($task) ? 'Edit' : 'Create'; ?> Task - Task Management App</title>
<link rel="stylesheet" href="public/css/style.css">
<script src="public/js/validation.js"></script>
</head>
<body>
<header>
    <nav>
        <a href="tasks.php">Tasks</a>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>
<div class="container">
    <h2><?php echo isset($task) ? 'Edit' : 'Create'; ?> Task</h2>
    <?php if (isset($error)) echo '<p class="error">'.$error.'</p>'; ?>
    <form name="taskForm" method="post" onsubmit="return validateTaskForm()">
        <input type="text" name="title" placeholder="Task Title"