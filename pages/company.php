<?php 

if(session_id() == '') {
    session_start();
}
   
    if(!isset($_SESSION['company'])){
        header("Location: login.php");
    }else{
        $getall_com = getCompanyById($_SESSION['company']);
        $com=mysqli_fetch_assoc($getall_com);

        $company_id = $com['company_id']; 
    }
?>