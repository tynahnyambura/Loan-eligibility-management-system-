<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Loan Eligibility Management System</title>

<link rel="stylesheet" href="style.css">

<style>

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:#f4f7fb;
}

header{
    background:#002b5c;
    color:white;
    padding:15px 50px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

header h2{
    margin:0;
}

nav a{
    color:white;
    text-decoration:none;
    margin-left:25px;
    font-weight:bold;
}

.hero{
    text-align:center;
    padding:80px 30px;
    background:white;
}

.hero h1{
    color:#002b5c;
    font-size:42px;
}

.hero p{
    font-size:18px;
    color:#555;
    width:70%;
    margin:auto;
    line-height:30px;
}

.buttons{
    margin-top:40px;
}

.btn{
    display:inline-block;
    text-decoration:none;
    padding:15px 35px;
    border-radius:8px;
    margin:10px;
    font-size:18px;
    font-weight:bold;
}

.login{
    background:#002b5c;
    color:white;
}

.register{
    background:#0d6efd;
    color:white;
}

.features{
    display:flex;
    justify-content:center;
    gap:25px;
    margin:60px;
}

.card{
    width:250px;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
    text-align:center;
}

.card h3{
    color:#002b5c;
}

.about{
    background:#e9f1ff;
    padding:50px;
    text-align:center;
}

.about h2{
    color:#002b5c;
}

footer{
    background:#002b5c;
    color:white;
    text-align:center;
    padding:15px;
}

</style>

</head>

<body>

<header>

<h2>Loan Management System</h2>

<nav>

<a href="#home">Home</a>

<a href="#about">About</a>

<a href="#features">Services</a>

<a href="#contact">Contact</a>

<a href="login.php">Login</a>

</nav>

</header>

<section class="hero" id="home">

<h1>Loan Eligibility Management System</h1>

<p>

This system enables members to register, check their loan eligibility,
apply for loans online, and monitor their loan application status.
Administrators can manage members, approve or reject loans,
and generate reports efficiently.

</p>

<div class="buttons">

<a href="login.php" class="btn login">Login</a>

<a href="register.php" class="btn register">Create Account</a>

</div>

</section>

<section class="features" id="features">

<div class="card">
<h3>Member Registration</h3>
<p>Create a secure member account.</p>
</div>

<div class="card">
<h3>Loan Eligibility</h3>
<p>Automatically determine loan eligibility.</p>
</div>

<div class="card">
<h3>Loan Application</h3>
<p>Members can apply for loans online.</p>
</div>

<div class="card">
<h3>Reports</h3>
<p>Generate member and loan reports instantly.</p>
</div>

</section>

<section class="about" id="about">

<h2>About the System</h2>

<p>

The Loan Eligibility Management System is designed to simplify
loan application processing by providing a centralized platform
where members can apply for loans and administrators can
efficiently manage applications and reports.

</p>

</section>

<section class="about" id="contact">

<h2>Contact</h2>

<p>
Loan Eligibility Management System<br>
Zetech University<br>
Email: info@loanmanagement.com
</p>

</section>

<footer>

&copy; 2026 Loan Eligibility Management System. All Rights Reserved.

</footer>

</body>
</html>