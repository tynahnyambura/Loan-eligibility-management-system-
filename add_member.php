<?php

include 'php/connection.php';



if(isset($_POST['submit'])){

    $fullname =
        $_POST['fullname'];

    $email =
        $_POST['email'];

    $phone =
        $_POST['phone'];

    $contribution =
        $_POST['contribution'];



    $sql = "INSERT INTO members
    (fullname,email,phone,contribution)

    VALUES

    ('$fullname',
     '$email',
     '$phone',
     '$contribution')";



    $result =
        mysqli_query($conn,$sql);



    if($result){

        echo "Member Added Successfully";
    }

    else{

        echo "Error Adding Member";
    }
}

?>