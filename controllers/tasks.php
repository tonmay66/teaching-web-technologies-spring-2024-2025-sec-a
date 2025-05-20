<!DOCTYPE html>
<html>
<head>
<title>Tasks - Task Management App</title>
<link rel="stylesheet" href="public/css/style.css">
<script src="public/js/validation.js"></script>
</head>
<body>
<header>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>
<div class="container">
    <h2>Your Tasks</h2>
    <a href="task_form.php">Create New Task</a>
    <?php if (empty($tasks)): ?>
        <p>No tasks found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Priority</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task['title']); ?></td>
                    <td><?php echo htmlspecialchars($task['description']); ?></td>
                    <td><?php echo htmlspecialchars($task['due_date']); ?></td>
                    <td class="priority-<?php echo strtolower($task['priority']); ?>">
                        <?php echo htmlspecialchars($task['priority']); ?>
                    </td>
                    <td><?php echo htmlspecialchars($task['category_name'] ?? ''); ?></td>
                    <td><?php echo $task['status'] ? 'Completed' : 'Pending'; ?></td>
                    <td>
                        <a href="task_form.php?id=<?php echo $task['id']; ?>">Edit</a> | 
                        <a href="task_delete.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
</body>
</html>