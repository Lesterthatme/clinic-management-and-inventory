<?php

$db_server = "127.0.0.1:3307";
$db_username = "root@";
$db_password = "";
$db_database = "clinic";

$conn = mysqli_connect($db_server, $db_username, $db_password, $db_database);
$conn = mysqli_connect("127.0.0.1:3307", "root@", "", "clinic");
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}
