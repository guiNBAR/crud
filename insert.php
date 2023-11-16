<?php
include 'opendb.php';

    $sno = $_POST['sno'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];

    if(isset($_POST['submit'])){
$insert = mysqli_query($conn, "INSERT INTO student VALUES ('$sno', '$fname', '$lname','$age')");
     if ($insert===true){
        echo "Registered Succesfully";
        header("location:../studform.php");
     } else{
        echo "error";
     }
        } else{
            $insert = mysqli_query($conn, "UPDATE student SET fname='$fname', lname='$lname', age='$age' where s_id='$sno'");
     if ($insert===true){
        echo "Updated Succesfully";
        header("location:../studform.php");
     } else{
        echo "error";
     }


        }
    
    
?>
