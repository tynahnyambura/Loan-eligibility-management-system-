<?php

session_start();
include 'php/connection.php';

$message = "";

$eligible_amount = isset($_GET['amount']) ? $_GET['amount'] : 0;

if(isset($_POST['apply_loan'])){

    $member_id = $_POST['member_id'];
    $loan_amount = $_POST['loan_amount'];

    if($loan_amount > $eligible_amount){

        $message = "Loan amount cannot exceed eligible amount.";

    }else{

        $insert = mysqli_query($conn,

        "INSERT INTO loan_applications
        (member_id, loan_amount, status)

        VALUES

        ('$member_id',
         '$loan_amount',
         'Pending')");

        if($insert){

            $message = "Loan Application Submitted Successfully.";

        }else{

            $message = mysqli_error($conn);

        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Apply Loan</title>
    <link rel="stylesheet"
          href="css/style.css">


</head>
<body>
    <div class="container"><h2>Apply Loan</h2><p class="message">
<?php echo $message; ?>
</p><form method="POST"><label>Member ID</label>

<input type="text"
name="member_id"
placeholder="Enter Member ID"
required>

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

<a href="dashboard.php">
    <br>
<button type="submit" name="back_to_dashboard">Back</button>
</br>
</a>
</div>
</body>
</html>