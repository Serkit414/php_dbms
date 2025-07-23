<?php 

require 'includes/init.php';

$conn = require 'includes/db.php';


Auth::requireLogin();
?>

<?php require 'includes/header.php'; ?>

<h2>Supervisor Interface</h2>

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
        <p>List of employees:</p>
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

<form method="post">

    <div>
        <label for="update">Update Title</label>
        <input name="update" id="update" placeholder="Update Title">
    </div>

    <div>
        <label for="content">Update Content</label>
        <textarea name="content" rows="4" cols="40" id="content" placeholder="Update Content"></textarea>
    </div>

    <div>
        <label for="published_at">Publication date and time</label>
        <input type="datetime-local" name="published_at" id="published_at">
    </div>

    <button>Submit</button>



</form>

<?php require 'includes/footer.php'; ?>