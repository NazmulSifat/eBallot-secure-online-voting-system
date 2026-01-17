<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "voting_portal";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Database connection failed");
}