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

?>

<?php 
if(isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age']; 

    if(empty($first_name) || empty($last_name) || empty($age)) {
        echo "All fields are required.";
    } else {
        $query = "UPDATE users SET first_name='$first_name', last_name='$last_name', age='$age' WHERE id='$id'";
        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed: " . mysqli_error($connection));
        } else {
            header("Location: index.php");
            exit();
        }
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
          <input type="submit" class="btn btn-primary" name="update" value="Update">
        </div>
</form>

<?php include('footer.php'); ?>