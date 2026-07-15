<?php

include 'php/connection.php';

if(isset($_GET['id'])){
$id = $_GET['id'];

mysqli_query($conn,

"UPDATE loan_applications
SET status='Rejected'
WHERE id='$id'");
}
header("Location: reports.php");
exit();

?>