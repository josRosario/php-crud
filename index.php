<?php include('header.php'); ?>
<?php include('dbconn.php'); ?>
<?php include('modal.php'); ?>
     <div class="box1">
         <h2>All Records</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add new record</button>
     </div>
   
    <table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Update</th>
            <th>Delete</th>
     
        </tr>
    </thead>
    <tbody>
        <?php 

        $query = "SELECT * FROM users";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed: " . mysqli_error($connection));
        }else{
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td><a href='update.php?id=" . $row['id'] . "' class='btn btn-success'>Update</a></td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";   
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<?php include('footer.php'); ?>