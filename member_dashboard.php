<?php
session_start();
include 'php/connection.php';

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn,
"SELECT * FROM members WHERE user_id='$user_id'");

$member = mysqli_fetch_assoc($query);

if(!$member){
    die("Member details not found. User ID=".$user_id);
}

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn,
"SELECT * FROM members WHERE user_id='$user_id'");

$member = mysqli_fetch_assoc($query);

if(!$member){
    die("Member details not found.");
}

/* Example eligibility calculation */
$contribution = isset($member['contribution']) ? $member['contribution'] : 0;
$eligible_amount = $contribution * 3;
?>
<!DOCTYPE html>
<html>
<head>

<title>Member Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f7fb;
}

.sidebar{
position:fixed;
left:0;
top:0;
width:250px;
height:100%;
background:#002b5c;
color:white;
padding-top:20px;
}

.sidebar h2{
text-align:center;
margin-bottom:30px;
}

.sidebar ul{
list-style:none;
}

.sidebar ul li{
padding:15px;
}

.sidebar ul li a{
color:white;
text-decoration:none;
display:block;
}

.sidebar ul li:hover{
background:#004080;
}

.main{
margin-left:250px;
padding:30px;
}

.header{
background:white;
padding:20px;
border-radius:10px;
margin-bottom:20px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.profile-card{
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
margin-bottom:20px;
}

.profile-card table{
width:100%;
}

.profile-card td{
padding:10px;
border-bottom:1px solid #ddd;
}

.cards{
display:flex;
gap:20px;
margin-bottom:20px;
}

.card{
flex:1;
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
text-align:center;
}

.actions{
display:flex;
gap:20px;
}

.action-box{
flex:1;
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
text-align:center;
}

.action-box a{
text-decoration:none;
color:#002b5c;
font-weight:bold;
}
</style>
</head>
<body>

<div class="sidebar">

<h2>LOAN MANAGEMENT</h2>

<ul>
<li><a href="member_dashboard.php">Dashboard</a></li>
<li><a href="member_loan.php">Check Eligibility</a></li>
<li><a href="member_apply_loan.php">Apply Loan</a></li>
<li><a href="member_reports.php">My Reports</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>

</div>

<div class="main">

<div class="header">




<h2>Member Dashboard</h2>

<h3>Welcome Back, <?php echo $member['fullname']; ?></h3>
</div>

<div class="profile-card">

<h2>My Profile</h2>

<table>

<tr>
<td><strong>Full Name</strong></td>
<td><?php echo $member['fullname']; ?></td>
</tr>

<tr>
<td><strong>Email</strong></td>
<td><?php echo $member['email']; ?></td>
</tr>

<tr>
<td><strong>Phone Number</strong></td>
<td><?php echo $member['phone']; ?></td>
</tr>

<tr>
<td><strong>National ID</strong></td>
<td><?php echo $member['national_id']; ?></td>
</tr>

<tr>
<td><strong>Member ID</strong></td>
<td><?php echo $member['id']; ?></td>
</tr>

</table>

</div>

<div class="cards">

<div class="card">
<h3>Member Since</h3>
<p><?php echo date('d M Y'); ?></p>
</div>

<div class="card">
<h3>Eligibility Status</h3>
<p style="color:green;">Eligible</p>
</div>

<div class="card">
<h3>Eligible Loan Amount</h3>
<p>Ksh <?php echo number_format($eligible_amount,2); ?></p>
</div>

</div>

<div class="actions">

<div class="action-box">
<a href="member_reports.php">
My Reports
</a>
</div>

<div class="action-box">
<a href="member_loan.php">
Check Eligibility
</a>
</div>

<div class="action-box">
<a href="member_apply_loan.php">
Apply Loan
</a>
</div>

</div>

</div>

</body>
</html>