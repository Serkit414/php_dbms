<?php

require 'includes/init.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = require 'includes/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['user_password'])) {

        Auth::login();
        Url::redirect('/');
    }
    else {
        $error = "Login incorrect.";
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if (! empty($error)) : ?>
    <p><?= $error ?></p>
<?php endif; ?>

<form method="post">

    <div>
        <label for="username">Username</label>
        <input name="username" id="username">
    </div>

    <div>
        <label for="user_password">Password</label>
        <input type="password" name="user_password" id="user_password">
    </div>

    <button>Log in</button>

</form>

<?php require 'includes/footer.php'; ?>