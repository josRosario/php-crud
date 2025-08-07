<?php include('header.php'); ?>
<?php include('dbconn.php'); ?>

<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_row($result);
    }
} else {
    header("Location: index.php");
    exit();
}

if(isset($_POST['delete'])) {
    $query = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($connection, $query);

    if(!$result) {
        die("Query failed: " . mysqli_error($connection));
    } else {
        header("Location: index.php");
        exit();
    }
}
?>

<form method="POST" action="">
   <div class="modal-body">
          <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="<?php echo $row[1]; ?>">
          </div>
          <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" value="<?php echo $row[2]; ?>">
          </div>
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" placeholder="Enter Age" name="age" value="<?php echo $row[3]; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-danger" name="delete" value="Delete">
        </div>
</form>
<?php include('footer.php'); ?>