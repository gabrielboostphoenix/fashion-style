<?php
    session_start();
    if(isset($_SESSION['compRealizd'])){
        unset($_SESSION['compRealizd']);
        header('location: ../index.php');
    } else {
        header('location: ../index.php');
    }
?>