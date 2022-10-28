<?php 

if(session_id() == '') {
    session_start();
}

    if(!isset($_SESSION['company'])){
        header("Location: create-profile.php");
    }
?>