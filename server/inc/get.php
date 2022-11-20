<?php

//reviews
function getAllReviews(){
	include 'connection.php';
	
	$review = "SELECT * FROM review";
	return mysqli_query($con,$review);
}

function checkuserPassword($data)
{
    include 'connection.php';
    $customer_id = $data['customer_id'];
    $password = $data['password'];

    $viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND password = '$password' AND customer_id = '$customer_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function checkCompanyPassword($data)
{
    include 'connection.php';
    $company_id = $data['company_id'];
    $company_password = $data['company_password'];

    $viewcat = "SELECT * FROM company WHERE is_deleted = 0 AND company_password = '$company_password' AND company_id = '$company_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function checkCompanyByEmail($company_login_email)
{
	include 'connection.php';

	$company = "SELECT * FROM company WHERE company_login_email = '$company_login_email' AND is_deleted = 0";
	$result = mysqli_query($con, $company);
	return mysqli_num_rows($result);
}

function checkUserEmail($data)
{
    include 'connection.php';

    $customer_id = $data['customer_id'];
    $email = $data['email'];

    $viewcat = "SELECT * FROM customer WHERE is_deleted = 0 AND email = '$email' AND customer_id = '$customer_id' ";
    $result = mysqli_query($con, $viewcat);
    $count = mysqli_num_rows($result);
    echo $count;
}

function getAllcustomerById($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = '0' AND customer_id = '$customer_id'";
    return mysqli_query($con, $q1);
}

function getCompanyById($company_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM company WHERE is_deleted = '0' AND company_id = '$company_id'";
    return mysqli_query($con, $q1);
}

function getAllcustomers()
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE is_deleted = 0 AND email != 'admin'";
    return mysqli_query($con, $q1);
}

function getLoginAdmin($data)
{
    include 'connection.php';

    $email = $data['email'];
    $password = $data['password'];

    $loginAdmin = "SELECT * FROM company WHERE company_login_email = '$email' AND permision = '1'  AND company_password ='$password'";
    $countloginAdmin = mysqli_query($con, $loginAdmin);
    $counts_loginAdmin = mysqli_num_rows($countloginAdmin);

    $loginCustomer = "SELECT * FROM customer WHERE email = '$email' AND permision = '1' AND password ='$password'";
    $count_loginCustomer = mysqli_query($con, $loginCustomer);
    $counts_loginCustomer = mysqli_num_rows($count_loginCustomer);

    $value = 0;

    if($counts_loginAdmin > 0){   

        $value = $counts_loginAdmin;

            $res = checkCompany($email);
            $row = mysqli_fetch_assoc($res);
            $_SESSION['company'] = $row['company_id'];

     
    }else if($counts_loginCustomer > 0){

        $value = $counts_loginCustomer;


        if ($email == 'admin') {
            $_SESSION['admin'] = $email;
        }else{
            $res = checkCustomerByEmail($email);
            $row = mysqli_fetch_assoc($res);
            $_SESSION['customer'] = $row['customer_id'];
        }
    }
      return $value;
    
}

function checkCustomerByEmail($email)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE email='$email' AND is_deleted='0'";
    return mysqli_query($con, $q1);
}

function checkJob($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM apply WHERE customer_id='$customer_id' AND is_deleted='0'";
    return mysqli_query($con, $q1);
}

function getAllCategory()
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = '0' ";
    return mysqli_query($con, $viewcat);
}

function getCategoryByID($cat_id)
{
    include 'connection.php';

    $viewcat = "SELECT * FROM category WHERE is_deleted = '0' AND cat_id = '$cat_id' ";
    return mysqli_query($con, $viewcat);
}


function applyListcustomer_ID($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM apply join customer on customer.customer_id = apply.customer_id join job on job.job_id = apply.job_id WHERE apply.customer_id='$customer_id' AND apply.is_deleted='0'";
    return mysqli_query($con, $q1);
}

function applyListJob_ID($job_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM apply join customer on customer.customer_id = apply.customer_id join job on job.job_id = apply.job_id WHERE apply.job_id='$job_id' AND apply.is_deleted='0'";
    return mysqli_query($con, $q1);
}

function jobListcompany_ID($company_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM job join company on company.company_id = job.company_id WHERE job.company_id='$company_id' AND job.is_deleted='0'";
    return mysqli_query($con, $q1);
}

function jobListJob_ID($job_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM job WHERE job_id = '$job_id'";
    return mysqli_query($con, $q1);
}

function checkApply($job_title)
{
    include 'connection.php';

    $q1 = "SELECT * FROM job WHERE job_title='$job_title' AND is_deleted='0'";
    return mysqli_query($con, $q1);
}

function checkCompany($company_login_email)
{
    include 'connection.php';

    $q1 = "SELECT * FROM company WHERE company_login_email='$company_login_email' AND is_deleted='0' ";
    return mysqli_query($con, $q1);
}

function getAllCompany()
{
    include 'connection.php';

    $q1 = "SELECT * FROM company WHERE is_deleted='0'";
    return mysqli_query($con, $q1);
}

function checkCustomerByID($customer_id)
{
    include 'connection.php';

    $q1 = "SELECT * FROM customer WHERE customer_id='$customer_id' AND is_deleted = '0'";
    return mysqli_query($con, $q1);
}


function getAllJobs(){
	include 'connection.php';

	$job = "SELECT * FROM job WHERE is_deleted = 0";
	return mysqli_query($con,$job);
}

function getAllJobsAvailable(){
	include 'connection.php';

	$job = "SELECT * FROM job WHERE is_deleted = 0 AND job_active = '0'";
	return mysqli_query($con,$job);
}

function getJobById($job_id){
	include 'connection.php';

	$job = "SELECT * FROM job join company on company.company_id = job.company_id WHERE job.is_deleted = 0 AND job.job_id = '$job_id'";
	return mysqli_query($con,$job);
}


//contact

function getAllMessages(){
	include 'connection.php';

	$messages = "SELECT * FROM contact";
	return mysqli_query($con,$messages);
}

//count

function dataCount($table){
	include 'connection.php';

	$counts = "SELECT * FROM $table";
	$res =  mysqli_query($con,$counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataCountWhere($table, $where){
	include 'connection.php';

	$counts = "SELECT * FROM $table WHERE $where";
	$res =  mysqli_query($con,$counts);
    $count =  mysqli_num_rows($res);
    echo $count;
}

function dataforCount($table){
	include 'connection.php';

	$counts = "SELECT sum(booking_price) as sum FROM $table";
    return mysqli_query($con,$counts);
}

function dataforCountMonth($table){
	include 'connection.php';

	$counts = "SELECT sum(booking_price) as sum FROM $table WHERE month(now()) = month(date_updated)";
    return mysqli_query($con,$counts);
}

function dataforCountToday($table){
	include 'connection.php';

	$counts = "SELECT sum(booking_price) as sum FROM $table WHERE day(now()) = day(date_updated)";
    return mysqli_query($con,$counts);
}

function dataforCountLastWeek($table){
	include 'connection.php';
    $NewDate = Date('y:m:d', strtotime('-7 days'));

	$counts = "SELECT sum(booking_price) as sum FROM $table WHERE NOT(date_updated < '$NewDate'  OR date_updated >  now())";
    return mysqli_query($con,$counts);
}

//search

function getAllItemsSearch($key)
{
	include 'connection.php';

	$viewcat = "SELECT * FROM job WHERE is_deleted = 0 AND job_active = 0 AND (job_title LIKE '%$key%' OR job_description LIKE '%$key%')";
	return mysqli_query($con, $viewcat);
}


//settings

function getAllSettings(){
	include 'connection.php';

	$settings = "SELECT * FROM settings";
	return mysqli_query($con,$settings);
}

function checkPasswordByName($data){
	include 'connection.php';
	$email = $data['email'];
	$password = $data['password'];

	$viewcat = "SELECT * FROM customer WHERE password = '$password' AND email = '$email' ";
	$result = mysqli_query($con,$viewcat);
	$count = mysqli_num_rows($result);
	echo $count;
}



function getAllOrdersByCustomer($customer_id){
	include 'connection.php';

	$viewcat = "SELECT * FROM booking WHERE customer_id = '$customer_id' AND is_deleted = '0' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}

function getAllOrders(){
	include 'connection.php';

	$viewcat = "SELECT * FROM booking join customer on customer.customer_id = booking.customer_id  WHERE booking.is_deleted = '0' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}

function getAllOrdersPending(){
	include 'connection.php';

	$viewcat = "SELECT * FROM booking join customer on customer.customer_id = booking.customer_id  WHERE booking.is_deleted = '0' AND booking.status = '0' ORDER BY date_updated DESC";
	return mysqli_query($con,$viewcat);
}




?>