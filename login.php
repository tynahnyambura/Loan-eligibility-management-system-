<?php
session_start();
include("php/connection.php");

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username=? AND password=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) >0){ 
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        
        if ($user['role'] == 'Admin') {
            header("Location: dashboard.php");
            exit();
        }
        else if ($user['role'] == 'member') {
            header("Location: member_dashboard.php");
            exit();
        }
    }else{
        $error = "Invalid credentials. Please try again.";
    }
}


    

?>
<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-box">
    <h1>Loan Eligibility Management System</h1>

  
    <form method="POST" action="login.php">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <div class="show-password">
            <input type="checkbox" id="showPass" onclick="togglePassword()">
            <label for="showPass">Show password</label>
        </div>
        <div class="button-group">
            <button type="submit" name="login">Login</button>
            <button type="reset">Cancel</button>
        </div>
        

    </form>
    <div class="forgot-password">
        <a href="php/forgot_password.php">Forgot password?</a>
        |
        <a href="register.php">Create Account</a>
    </div>


</div>
<script src="js/login.js"></script>
</body>
</html>