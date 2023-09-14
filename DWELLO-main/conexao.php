<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "bddwello";

    $conn = new mysqli($host, $username, $password, $db);

    if($conn->connect_errno != 0)
        echo "Falha de conexão: (".$conn->connect_errno.")";
?>