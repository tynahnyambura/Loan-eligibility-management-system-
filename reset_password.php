<?php
include 'php/connection.php';

$message = "";

$username = $_GET['username'];

if(isset($_POST['reset'])){

    $new_password = $_POST['new_password'];

    $update = mysqli_query($conn,
    "UPDATE users
    SET password='$new_password'
    WHERE username='$username'");

    if($update){

        $message = "Password updated successfully.";

    }else{

        $message = "Error updating password.";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>
</head>
<body>

<h2>Reset Password</h2>

<?php if($message!="") echo $message; ?>

<form method="POST">

<input type="password"
name="new_password"
placeholder="New Password"
required>

<br><br>

<button type="submit" name="reset">
Reset Password
</button>

</form>

<br>

<a href="login.php">Back to Login</a>

</body>
</html>