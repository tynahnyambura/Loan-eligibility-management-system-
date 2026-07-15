<?php
session_start();
include 'php/connection.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$message = "";

$eligible_amount = isset($_GET['amount']) ? $_GET['amount'] : 0;

$user_id = $_SESSION['user_id'];

/* Get logged in member */
$getNational = mysqli_query($conn,
"SELECT id
FROM members
WHERE user_id='$user_id'");

$national = mysqli_fetch_assoc($getNational);

$national_id = $national['id'];

if(isset($_POST['apply_loan'])){

    $loan_amount = $_POST['loan_amount'];

    if($loan_amount > $eligible_amount){

        $message = "Loan amount cannot exceed eligible amount.";

    }else{

        $insert = mysqli_query($conn,

        "INSERT INTO loan_applications
        (member_id, loan_amount, status)

        VALUES

        ('$national_id',
        '$loan_amount',
        'Pending')");

        if($insert){

            echo "<script>
            alert('Loan Application Submitted Successfully');
            window.location='member_reports.php';
            </script>";
            exit();

        }else{

            $message = mysqli_error($conn);

        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> My Apply Loan</title>
    <link rel="stylesheet"
          href="css/style.css">


</head>
<body>
    <div class="container">
        <h2>Apply Loan</h2>
        <p class="message">
<?php echo $message; ?>
</p><form method="POST">

<input type="hidden"
name="member_id"
value="<?php echo $national_id; ?>">

<label>Eligible Amount</label>

<input type="text"
value="<?php echo $eligible_amount; ?>"
readonly>

<label>Loan Amount</label>

<input type="number"
name="loan_amount"
max="<?php echo $eligible_amount; ?>"
required>


<button type="submit" name="apply_loan">Apply Loan

</button>

</form>

<a href="member_dashboard.php">
    <br>
<button type="submit" name="back_to_member_dashboard">Back</button>
</br>
</a>
</div>
</body>
</html>