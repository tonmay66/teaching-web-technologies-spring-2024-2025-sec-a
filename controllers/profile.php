<!DOCTYPE html>
<html>
<head>
<title>Edit Profile - Task Management App</title>
<link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>
<div class="container">
    <h2>Edit Profile</h2>
    <?php if (isset($error)) echo '<p class="error">'.$error.'</p>'; ?>
    <?php if (isset($success)) echo '<p class="success">'.$success.'</p>'; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>