<?php

session_start();

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'php/connection.php';

$members = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM users");

$memberRow = mysqli_fetch_assoc($members);

$totalMembers = $memberRow['total'];

$loans = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM loan_applications");

$loanRow = mysqli_fetch_assoc($loans);

$totalLoans = $loanRow['total'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>


    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet"
          href="css/style.css">

</head>
<script src="js/dashboard.js"></script>

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

    <h1>Dashboard</h1>
    <h2>Loan Eligibility Management System</h2>
    <h3>Welcome, Admin!</h3>

<p>
    <strong>Today's Date:</strong>
    <?php echo date("l, d F Y"); ?>
</p>


    <div class="cards">

        <div class="card">

            <h1>Total Members</h1>

            <p><?php echo $totalMembers; ?></p>

        </div>

        <div class="card">

            <h1>Total Loans</h1>

            <p><?php echo $totalLoans; ?></p>

        </div>

        <div class="card">

            <h1>Reports</h1>

            <button onclick="window.location.href='reports.php'">View Reports</button>
        </div>

    </div>

</div>

</body>
</html>