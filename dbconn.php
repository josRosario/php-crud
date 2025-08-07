<?php 
    define("HOSTNAME", "127.0.0.1");
    define("MYSQL_USER", "dolidbuser");
    define("MYSQL_PASSWORD", "dolidbpass");
    define("MYSQL_DATABASE", "dolidb");

    $connection = mysqli_connect(HOSTNAME, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "yess";
    }
?>
