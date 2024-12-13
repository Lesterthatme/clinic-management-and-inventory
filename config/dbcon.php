<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "clinic";

$conn = new mysqli($db_server, $db_username, "", $db_database);
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
}