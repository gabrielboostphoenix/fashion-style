<?php
    session_start();

    if(!isset($_SESSION['token_auth']) && !isset($_SESSION['token_authAdmin'])){
        header("location: ../index.php");
    } else {
        if(isset($_SESSION['token_authAdmin'])){
            header("location: ../view/admin/");
        } else if(isset($_SESSION['token_auth'])){
            header("location: ../view/index.php");
        }
    }
?>