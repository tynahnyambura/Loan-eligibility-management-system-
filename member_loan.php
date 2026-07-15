<?php
session_start();
include 'php/connection.php';

if (!isset($_SESSION['user'])) {
    header("Location: member_loan.php");
    exit();
}

$message = "";

if(isset($_POST['apply_loan'])){

    $member_id = $_POST['member_id'];
    $loan_amount = $_POST['loan_amount'];
    $loan_type = $_POST['loan_type'];
    $loan_date = $_POST['loan_date'];
   

    // Check member eligibility
    $member = mysqli_query($conn,
    "SELECT eligibility_status
     FROM members
     WHERE id='$member_id'");

    $row = mysqli_fetch_assoc($member);

    if($row['eligibility_status'] != 'Eligible'){

        $message = "Member is not eligible for a loan.";

    }else{

        mysqli_query($conn,
        "INSERT INTO loan_applications
        (member_id, loan_amount, loan_type, status)
        VALUES
        ('$member_id', '$loan_amount', '$loan_type', 'Pending')");

        $message = "Loan application submitted successfully.";
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Loans Page</title>

    <link rel="stylesheet"
          href="css/style.css">

</head>
<body>

<div class="sidebar">

    <h2>Loan System</h2>
    <ul>
        <li>
            <a href="member_dashboard.php">
               Member Dashboard
            </a>
        </li>

        

        <li>
            <a href="member_loan.php">
               My Loans
            </a>
        </li>

        <li>
            <a href="member_reports.php">
                My Reports
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

    <h1>Loan Eligibility Form</h1>

    <form>

        <label>Contribution Amount</label>

        <input type="number"
               id="contribution"
               placeholder="Enter Contribution Amount">

        <label>Attendance Score</label>

        <input type="number"
               id="attendance"
               placeholder="Enter Attendance Score">

        <label>Participation Score</label>

        <input type="number"
               id="participation"
               placeholder="Enter Participation Score">

        <button type="button"
                onclick="calculateScore()">

            Calculate Eligibility

        </button>

    </form>

    
</div>
<script>
function calculateScore() {

    var contribution = parseFloat(document.getElementById("contribution").value);
    var attendance = parseFloat(document.getElementById("attendance").value);
    var participation = parseFloat(document.getElementById("participation").value);

    if (isNaN(contribution) || isNaN(attendance) || isNaN(participation)) {
        alert("Please fill in all fields.");
        return;
    }

    var eligibleAmount = contribution * 3;

    if (attendance >= 70 && participation >= 60) {
        var applyLoan = confirm(
            "Congratulations!\n\n" +
            "You are eligible for a loan.\n\n" +
            "Attendance: " + attendance +
            "\nParticipation: " + participation +
            "\n\nEligible Amount: KES " + eligibleAmount +
            "\n\nPress OK to Apply Loan."+
           "\nPress Cancel to go back."
        );

      
    if(applyLoan) {
        window.location = "member_apply_loan.php?amount=" + eligibleAmount;
}else{
    return;
}

    } else {

        alert(
            "Sorry!\n\n"+
            "You are not eligible for a loan.\n\n"+
            "Minimum requirements:\n"+
            "- Attendance: 70\n"+
            "- Participation: 60\n"
        );
    }
}
</script>

</body>
</html>