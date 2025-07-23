<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Nova Management</title>
    <meta charset="utf-8">
</head>
<body>

    <header>
        <h1>Nova Project Management System</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <?php if (Auth::isLoggedIn()): ?>
                
                <li><a href="/admin/">Admin</a></li>
                <li><a href="/logout.php">Log out.</a></li>

            <?php else: ?>
                <li><a href="/login.php">Log In.</a></li>

            <?php endif; ?>
        </ul>
    </nav>
    <main>
