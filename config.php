<?php
session_start();
$conn = mysqli_connect(
    "localhost",
    "root",
    "mysql",
    "dml"
);
if (!$conn){
    die("Eroare conectare " . mysqli_connect_error());
}

?>