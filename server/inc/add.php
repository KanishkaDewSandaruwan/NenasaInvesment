<?php

function addCompany($data, $img)
{
	include 'connection.php';

	$company_name = $data['company_name'];
	$tagline = $data['tagline'];
	$company_description = $data['company_description'];
	$website = $data['website'];
	$facbook = $data['facbook'];
	$twitter = $data['twitter'];
	$lonkdin = $data['lonkdin'];
	$company_login_email = $data['company_login_email'];
	$company_password = $data['company_password'];
	$company_admin_email = $data['company_admin_email'];
	$company_admin_phone = $data['company_admin_phone'];

	$count = checkCompanyByEmail($company_login_email);

	if ($count == 0) {

		$sql = "INSERT INTO company(company_name, tagline, company_description, website, facbook, twitter, lonkdin, company_login_email, company_password, company_admin_email, company_admin_phone, company_logo, is_deleted, date_updated,permision)
		VALUES('$company_name', '$tagline', '$company_description', '$website', '$facbook' ,'$twitter' , '$lonkdin', '$company_login_email', '$company_password', '$company_admin_email', '$company_admin_phone', '$img', 0 , now(), 0)";
		return mysqli_query($con, $sql);

	}
	else {
		echo json_encode($count);
	}
}

function addJob($data, $img)
{
	include 'connection.php';

	$company_id = $data['company_id'];
	$job_title = $data['job_title'];
	$job_location = $data['job_location'];
	$type = $data['type'];
	$job_description = $data['job_description'];
	$job_active = $data['job_active'];
	$closing_date = $data['closing_date'];

	$count_loginCustomer = checkJob($job_title);
	$count = mysqli_num_rows($count_loginCustomer);

	if ($count == 0) {

		$sql = "INSERT INTO job(job_image, job_title, job_location, type, job_description, is_deleted, job_active, closing_date, date_updated, company_id) 
		VALUES('$img', '$job_title', '$job_location', '$type', '$job_description', 0, '$job_active', '$closing_date' , now(), '$company_id')";
		return mysqli_query($con, $sql);

	}
	else {
		echo json_encode($count);
	}
}

function applyJob($data, $img)
{
	include 'connection.php';

	$customer_id = $data['customer_id'];
	$job_id = $data['job_id'];
	$additional_details = $data['additional_details'];

	$checkJobApply = checkApply($customer_id);
	$count = mysqli_num_rows($checkJobApply);

	if ($count == 0) {

		$sql = "INSERT INTO apply(customer_id, job_id, resume, additional_details, is_deleted, date_updated, apply_status) 
		VALUES('$customer_id', '$job_id', '$img', '$additional_details', 0, now(), 0)";
		return mysqli_query($con, $sql);

	}
	else {
		echo json_encode($count);
	}
}


//contact
function addMessage($data)
{
    include 'connection.php';

    $name = $data['name'];
    $email = $data['email'];
    $subject = $data['subject'];
    $message = $data['message'];


	$sql = "INSERT INTO contact(name, email, subject, message, date_updated) VALUES('$name', '$email', '$subject', '$message', now())";
	return mysqli_query($con, $sql);
}

function addreview($data)
{
    include 'connection.php';

    $review_review = $data['review_review'];
    $review_name = $data['review_name'];
    $review_email = $data['review_email'];


	$sql = "INSERT INTO review(review_review, review_name, review_email, date_updated) VALUES('$review_review', '$review_name', '$review_email', now())";
	return mysqli_query($con, $sql);
}


function createCustomer($data)
{
	include 'connection.php';

	$name = $data['name'];
	$email = $data['email'];
	$phone = $data['phone'];
	$nic = $data['nic'];
	$address = $data['address'];
	$gender = $data['gender'];
	$password = $data['password'];

	$sql = "INSERT INTO customer(name, email, phone, nic, address, gender, password, is_deleted, permision) VALUES('$name', '$email', '$phone', '$nic', '$address', '$gender', '$password', 0 , 0)";
	return mysqli_query($con, $sql);
	
}

?>