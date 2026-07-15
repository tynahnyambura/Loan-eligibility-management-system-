<?php
session_start();
include 'php/connection.php';

if(isset($_GET['approve'])){

    $id = $_GET['approve'];

    mysqli_query($conn,
    "UPDATE loan_applications
     SET status='Approved'
     WHERE id='$id'");

    header("Location: reports.php");
    exit();
}

if(isset($_GET['reject'])){

    $id = $_GET['reject'];

    mysqli_query($conn,
    "UPDATE loan_applications
     SET status='Rejected'
     WHERE id='$id'");

    header("Location: reports.php");
    exit();

    
    $sql = mysqli_query($conn,
    "SELECT * FROM loan_applications
    ORDER BY created_at DESC");         
}

?>
<!DOCTYPE html>
<html>
<head>
<title>System Reports</title>
<style>

body{
    font-family:Arial, sans-serif;
    background:#f4f6f9;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}

th{
    background:#0d6efd;
    color:#fff;
    padding:12px;
}

td{
    padding:10px;
    text-align:center;
    border:1px solid #ddd;
}

tr:nth-child(even){
    background:#f2f2f2;
}

tr:hover{
    background:#d9ecff;
}

.approve{
    background:green;
    color:white;
    padding:6px 10px;
    border-radius:5px;
    text-decoration:none;
}

.reject{
    background:red;
    color:white;
    padding:6px 10px;
    border-radius:5px;
    text-decoration:none;
}


</style>
<link rel="stylesheet" href="css/style.css">
</head>
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

<h1>System Reports</h1>

<?php

$reports = mysqli_query($conn,"
SELECT
m.national_id,
l.loan_amount,
l.status,
l.created_at,
l.id
FROM loan_applications l
INNER JOIN members m
ON l.member_id = m.id
ORDER BY l.created_at DESC
");
?>

<table border="1" width="100%" cellpadding="10">

<tr>
    <th>National ID</th>
    <th>Loan Amount</th>
    <th>Status</th>
    <th>Application Date</th>
    <th>Action</th>
</tr>

<?php

if(mysqli_num_rows($reports) > 0){

    while($row = mysqli_fetch_assoc($reports)){
?>

<tr>

    <td><?php echo $row['national_id']; ?></td>

    <td><?php echo $row['loan_amount']; ?></td>

    <td><?php echo $row['status']; ?></td>

    <td><?php echo $row['created_at']; ?></td>

    <td>

    <?php if($row['status'] == 'Pending'){ ?>

        <a href="reports.php?approve=<?php echo $row['id']; ?>">
            Approve
        </a>

        |

        <a href="reports.php?reject=<?php echo $row['id']; ?>">
            Reject
        </a>

    <?php } else { ?>

        <?php echo $row['status']; ?>

    <?php } ?>

    </td>

</tr>

<?php

    }

}else{

?>

<tr>
    <td colspan="5">No loan records found.</td>
</tr>

<?php

}

?>

</table1>
<br>



</div>

</body>

</html>