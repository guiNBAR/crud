<?php
include 'opendb.php';

if (isset($_GET['delete'])) {
    $del =mysqli_query($conn, "DELETE from student where s_id='".$_GET['delete']."'");
    header("location:../studform.php");

}
?>
