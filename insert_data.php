<?php include('dbconn.php'); ?>

<?php

    if(isset($_POST['add_record'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age']; 

        if(empty($first_name) || empty($last_name) || empty($age)) {
            echo "All fields are required.";
        } else {
            $query = "INSERT INTO users (first_name, last_name, age) VALUES ('$first_name', '$last_name', '$age')";
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