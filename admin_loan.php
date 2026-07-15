<?php

include 'php/connection.php';

$result = mysqli_query($conn,
"SELECT * FROM loan_applications
ORDER BY created_at DESC");

?><!DOCTYPE html><html>
<head>
<title>Manage Loans</title><style>

body{
    font-family:Arial;
    background:#f4f4f4;
    padding:20px;
}

h2{
    color:#003366;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th{
    background:#003366;
    color:white;
    padding:10px;
}

td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

.approve-btn{
    background:green;
    color:white;
    padding:6px 10px;
    text-decoration:none;
    border-radius:4px;
}

.reject-btn{
    background:red;
    color:white;
    padding:6px 10px;
    text-decoration:none;
    border-radius:4px;
}

.back-btn{
    display:inline-block;
    margin-top:20px;
    background:#003366;
    color:white;
    padding:10px 15px;
    text-decoration:none;
    border-radius:5px;
}

</style></head><body><h2>Loan Applications</h2><table><tr>
    <th>Member ID</th>
    <th>Loan Amount</th>
    <th>Status</th>
    <th>Date</th>
    <th>Action</th>
</tr><?php while($row = mysqli_fetch_assoc($result)){ ?><tr><td><?php echo $row['member_id']; ?></td>

<td><?php echo $row['loan_amount']; ?></td>

<td><?php echo $row['status']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<?php if($row['status'] == 'Pending'){ ?>

    <a class="approve-btn"
       href="approve.php?id=<?php echo $row['id']; ?>">
       Approve
    </a>

    <a class="reject-btn"
       href="reject.php?id=<?php echo $row['id']; ?>">
       Reject
    </a>

<?php } else { ?>

    <?php echo $row['status']; ?>

<?php } ?>
</td>

</tr><?php } ?></table><br><a href="dashboard.php" class="back-btn">
Back To Admin Dashboard
</a></body>
</html>