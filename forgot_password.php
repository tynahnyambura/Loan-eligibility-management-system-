<?php
// load DB connection from same directory
require_once __DIR__ . '/connection.php';

$message = "";

if(isset($_POST['submit'])){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check = mysqli_query($conn,
    "SELECT * FROM users
    WHERE username='$username'
    AND email='$email'");

    if(mysqli_num_rows($check) > 0){

        header("Location: reset_password.php?username=".$username);
        exit();

    }else{

        $message = "Username or Email not found.";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Loan Eligibility Management System</h2>

<h3>Forgot Password</h3>

<p style="color:red;">
<?php echo $message; ?>
</p>

<form method="POST">

<label>Username</label>

<input
type="text"
name="username"
placeholder="Username"
required>

<label>Email Address</label>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<button
type="submit"
name="submit">
Continue
</button>

</form>

<br>

<a href="../login.php">
<button type="button">
Back to Login
</button>
</a>

</div>

</body>
</html>