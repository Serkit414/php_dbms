<?php 

require 'includes/init.php';


Auth::requireLogin();
//$conn = require 'includes/db.php';
?>


<?php require 'includes/header.php'; ?>

<h2>Project Manager Interface</h2>

<?php

$conn = mysqli_connect("us-cdbr-east-03.cleardb.com","be4838a94ecf6a","62618ca8","heroku_e8321b0f885dce1");

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}

$sql = "SELECT *
        FROM user;";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
}
else {
    $users = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
?>

<main>
        <?php if (empty($users)): ?>
            <p>No users found.</p>
        <?php else: ?>
        <p>List of users:</p>
            <ul>
                <?php foreach ($users as $user): ?>
                    <li>
                        <article>
                            <p><?= $user['first_name']; ?></p>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>
    </main>
<?php require 'includes/footer.php'; ?>

