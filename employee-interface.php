<?php 

require 'includes/init.php';


Auth::requireLogin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
}
?>

<?php require 'includes/header.php'; ?>

<h2>Employee Interface</h2>

<h3>Current Project</h3>
    <p>Display current project name here.</p>
    <p>Start Date: enter date here.</p>
    <p>Next Update Due: enter date here.</p>
    <p>Expected Completion Date: enter date here.</p>

<h3>Deploy Update</h3>
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

<?php
$empId = intval(2); // hard code for the demo. In real world, the id should be retrieved in PHP SESSION

// active (StatusID = 2) tasks datagrid for the current employee
$dgTask = new C_DataGrid("SELECT * FROM tasks", "id", "tasks");
$dgTask->set_query_filter(" EmployeeID = $empId AND StatusID = 2 "); // Active value is 2

// hours reported for the current employee
$dgHour = new C_DataGrid("SELECT * FROM hours", "id", "hours");
$dgHour->set_query_filter(" EmployeeID = $empId ");
$dgHour->enable_edit();

// hours datagrid is a subgrid of the tasks datagrid
$dgTask->set_subgrid($dgHour, "TaskID", "id");
$dgTask->display();
?>

<?php require 'includes/footer.php'; ?>