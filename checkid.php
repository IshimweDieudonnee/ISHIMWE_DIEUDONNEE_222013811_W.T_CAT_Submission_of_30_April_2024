<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("location:login.php");
    }
    include "connect.php";
    
    $id = $_GET['id'];

        $sel = mysqli_query($con, "SELECT * FROM staff WHERE empid=$id");
        $staff = mysqli_num_rows($sel);
        $row = mysqli_fetch_array($sel);

    if($staff !=0 ){
        echo json_encode([$row['firstname'],$row['lastname']]);
    }
    else{
        echo $staff;
    }
?>