<?php

include 'php/connection.php';

if(isset($_POST['submit'])) {

    $member_name = $_POST['member_name'];
    $loan_amount = $_POST['loan_amount'];

    $sql = "INSERT INTO loans
    (member_name,loan_amount)
    VALUES
    ('$member_name','$loan_amount')";

    if(mysqli_query($conn,$sql)) {

        header("Location: ../loans.php");
        exit();

    } else {

        echo mysqli_error($conn);
    }
}

?>