<?php

require 'includes/init.php';

$conn = require 'includes/db.php';
?>

<?php if (Auth::isLoggedIn()): ?>
    <?php require 'includes/header.php'; ?>
    <p><a href="employee-interface.php">Employee Interface</a></p>
    <p><a href="supervisor-interface.php">Supervisor Interface</a></p>
    <p><a href="project-manager-interface.php">Project Manager Interface</a></p>
    <p><a href="stock-holder-interface.php">Stock Holder Interface</a></p>

<?php else: ?>
    <h1>Nova Project Management System!</h1>
    <p><a href="new-user.php">Register here.</a></p>
    <p>Already registered?<a href="login.php">Log in.</a></p>
<?php endif; ?>



<?php require 'includes/footer.php'; ?>