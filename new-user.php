<?php require 'includes/init.php';?>

<?php

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = require 'includes/db.php';

    $user->username = $_POST['username'];
    $user->user_password = $_POST['user_password'];
    $user->email = $_POST['email'];
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];

    if ($user->create($conn)) : ?>

        <p>User created successfully. Pleae Log in.</p>

    <?php endif; 
}
?>

<?php require 'includes/header.php'; ?>

<h2>New User</h2>

<?php require 'includes/user-form.php'; ?>

<?php require 'includes/footer.php'; ?>