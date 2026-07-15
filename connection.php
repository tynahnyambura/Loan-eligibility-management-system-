<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "loan_management_system"
);

if(!$conn){

    die("Connection Failed: " . mysqli_connect_error());
}

?>