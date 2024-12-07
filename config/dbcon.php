<?php
define("hostname","localhost");
define("username","root");
define("password", "");
define("db_name", "clinic");

$conn = mysqli_connect(hostname, username, password, db_name);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>