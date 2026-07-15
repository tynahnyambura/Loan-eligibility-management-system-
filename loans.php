<?php
session_start();
include 'php/connection.php';

if(isset($_GET['approve'])){

    $id = $_GET['approve'];

    mysqli_query($conn,
    "UPDATE loan_applications
     SET status='Approved'
     WHERE id='$id'");

    header("Location: loans.php");
    exit();
}

if(isset($_GET['reject'])){

    $id = $_GET['reject'];

    mysqli_query($conn,
    "UPDATE loan_applications
     SET status='Rejected'
     WHERE id='$id'");

    header("Location: loans.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Loans Page</title>

    <link rel="stylesheet"
          href="css/style.css">

</head>
<script src="js/loans.js"></script>

<body>

<div class="sidebar">

    <h2>Loan System</h2>
    <ul>
        <li>
            <a href="dashboard.php">
                Dashboard
            </a>
        </li>

        <li>
            <a href="members.php">
                Members
            </a>
        </li>

        <li>
            <a href="loans.php">
                Loans
            </a>
        </li>

        <li>
            <a href="reports.php">
                Reports
            </a>
        </li>

        <li>
            <a href="login.php">
                Logout
            </a>
        </li>

    </ul>

</div>

<div class="main-content">

    <h1>Loan Eligibility Form</h1>

    <form>

        <label>Contribution Amount</label>

        <input type="number"
               id="contribution"
               placeholder="Enter Contribution Amount">

        <label>Attendance Score</label>

        <input type="number"
               id="attendance"
               placeholder="Enter Attendance Score">

        <label>Participation Score</label>

        <input type="number"
               id="participation"
               placeholder="Enter Participation Score">

        <button type="button"
                onclick="calculateScore()">

            Calculate Eligibility

        </button>

    </form>

    
</div>

<script src="js/script.js"></script>

</body>
</html>