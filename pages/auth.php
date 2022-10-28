<?php 

if(session_id() == '') {
    session_start();
}

    if(!isset($_SESSION['customer'])){
        header("Location: login.php");
    }
?>