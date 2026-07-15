<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'loan_management_system');
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
    $member_id = $member['id'];
}


if(isset($_POST['add_member'])){

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $national_id =$_POST['national_id'];
    $user_id = $_SESSION['user']['id'];
    

    $attendance = $_POST['attendance'];
    $contribution = $_POST['contribution'];
    $participation = $_POST['participation'];

    if(
        $attendance >= 65 &&
        $contribution >= 5000 &&
        $participation >= 10
    ){
        $eligibility_status = "Eligible";
    }else{
        $eligibility_status = "Not Eligible";
    }

    mysqli_query($conn,
"INSERT INTO members
(fullname,email,phone,national_id,user_id)
VALUES
('$fullname','$email','$phone','$national_id','$user_id')");

$member_id = mysqli_insert_id($conn);

header("Location: loans.php?member_id=".$member_id);
exit();
 }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

    <title>Members Page</title>

    <link rel="stylesheet"
          href="css/style.css">

</head> 
<script src="js/members.js"></script>

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

    <h1>Registered Members</h1>

<table border="1">
<tr>
    <th>Full Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>National ID</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM members ORDER BY id DESC");

while($row=mysqli_fetch_assoc($result)){
?>

<tr>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['national_id']; ?></td>
</tr>

<?php
}
?>

</table>

</div>

</body>
</html>
