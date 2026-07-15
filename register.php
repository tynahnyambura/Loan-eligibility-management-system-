<?php

include 'php/connection.php';

$message = "";

if(isset($_POST['register'])){
    
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $national_id = $_POST['national_id'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($check) > 0){

        $message = "Username already exists.";

    }else{

        mysqli_query($conn,
        "INSERT INTO users(username,password,role)
        VALUES('$username','$password','member')");
        $user_id = mysqli_insert_id($conn);

        mysqli_query($conn,
        "INSERT INTO members(user_id,fullname,email,national_id,phone)
        VALUES
        ('$user_id','$full_name','$email','$national_id','$phone')");

        $message = "Account created successfully.";
 }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="css/style.css">



</head>
<body>
    <div class="register-box">

<h2>Create Account</h2>

<p style="color:green;">
        <?php echo $message; ?>
        </p> 
<form method="POST">

    <label>Full Name</label><br>
    <input type="text" name="full_name" placeholder="Enter Full Name" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" placeholder="Enter Email" required><br><br>

    <label>National ID</label><br>
    <input type="text" name="national_id" placeholder="Enter National ID" required><br><br>

    <label>Phone Number</label><br>
    <input type="text" name="phone" placeholder="Enter Phone Number" required><br><br>

    <label>Username</label><br>
    <input type="text" name="username" placeholder="Enter Username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" id="password" placeholder="Enter Password" required><br><br>

    <div class="show-password">
        <input type="checkbox" onclick="showPassword()"> Show Password
    </div>

    <button type="submit" name="register">
        Create Account
</button>
<p class="links">
<a href="login.php">Back to Login</a>
</p>
</form>
    </div>

<script>
function showPassword() {
    var x = document.getElementById("password");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

</body>
</html>