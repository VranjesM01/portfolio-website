<?php

$username = "root";
$password = "";
$host = "localhost";
$db = "momcilo";

$conn = mysqli_connect("$host", "$username", "$password", "$db") or die("DataBase Connection Error");
