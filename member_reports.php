<?php

session_start();
include 'php/connection.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* Get logged in member */
$member = mysqli_query($conn,
"SELECT id, national_id
FROM members
WHERE user_id='$user_id'");

$memberRow = mysqli_fetch_assoc($member);

if(!$memberRow){
    die("Member not found.");
}

$member_id = $memberRow['id'];  //Use this member_id to fetch loan reports

/* Fetch ONLY this member's loan reports */
$loans = mysqli_query($conn,

"SELECT
m.national_id,
l.loan_amount,
l.status,
l.created_at

FROM loan_applications l

INNER JOIN members m
ON l.member_id = m.id

WHERE l.member_id='$member_id'

ORDER BY l.created_at DESC");

?>

<!DOCTYPE html>
<html>
<head>
<title>My Reports</title>
    <style>
        .main{
            margin-left:250px;
            padding:30px;
    width:calc(100% - 250px);
}
.sidebar{
    position:fixed;
    left:0;
    top:0;
    width:250px;
    height:100vh;
    background:#001f4d;
    color:white;
    padding-top:20px;
}
table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th{
    background:#00a2ff;
    color:white;
    padding:12px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
}
</style>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
   
<div class="sidebar">

    <h2>Loan System</h2>

    <ul>

        <li>
            <a href="member_dashboard.php">
                Dashboard
            </a>
        </li>

        <li>
            <a href="member_loan.php">
                Check Eligibility
            </a>
        </li>

        <li>
            <a href="member_apply_loan.php">
                Apply Loan
            </a>
        </li>

        <li>
            <a href="member_reports.php">
                My Reports
            </a>
        </li>

        <li>
            <a href="logout.php">
                Logout
            </a>
        </li>

    </ul>

</div>

<div class="main">

<h1>My Loan Reports</h1>



<table border="1" width="100%" cellpadding="10">
<tr>
<th>National ID</th>
<th>Loan Amount</th>
<th>Status</th>
<th>Date</th>
</tr>

<?php
if(mysqli_num_rows($loans) > 0){

    while($row = mysqli_fetch_assoc($loans)){
?>

<tr>
<td><?php echo $row['national_id']; ?></td>
<td><?php echo $row['loan_amount']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['created_at']; ?></td>
</tr>

<?php
    }

}else{
?>

<tr>
<td colspan="4">No loan records found.</td>
</tr>

<?php
}
?>

</table>

</div>
</body>
</html>