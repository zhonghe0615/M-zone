<?php
    $host_name  = "db563247545.db.1and1.com";
    $database   = "db563247545";
    $user_name  = "dbo563247545";
    $password   = "asdf1234";

    $connect = mysqli_connect($host_name, $user_name, $password, $database);
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>