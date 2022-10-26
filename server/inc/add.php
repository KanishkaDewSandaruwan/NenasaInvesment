<?php

function addService($data, $img)
{
	include 'connection.php';

	$service_name = $data['service_name'];
	$service_details = $data['service_details'];
	$service_price = $data['service_price'];
	$waiting_time = $data['waiting_time'];
	$service_active = $data['service_active'];
	$number_of_works = $data['number_of_works'];

	$count = checkProductByName($service_name);

	if ($count == 0) {

		$sql = "INSERT INTO service(service_name, service_price, service_details, waiting_time, is_deleted, service_active, service_image, number_of_works) VALUES('$service_name', '$service_price', '$service_details', '$waiting_time', 0, '$service_active' ,'$img' , '$number_of_works')";
		return mysqli_query($con, $sql);

	}
	else {
		echo json_encode($count);
	}
}

function addBooking($data)
{
	include 'connection.php';

	$customer_id = $data['customer_id'];
	$service_id = $data['service_id'];
	$booking_date = $data['booking_date'];
	$booking_time = $data['booking_time'];
	$booking_price = $data['booking_price'];
	$speacial_request = $data['speacial_request'];
	$number_of_works = $data['number_of_works'];
	$waiting_time = $data['waiting_time'];


    $newTime = date('H:i:s', strtotime($booking_time. ' + ' . $waiting_time . ' hours'));

	$newStartTime = $booking_date. " " . $booking_time;
	$newEndTime = $booking_date. " " . $newTime;

	$count = checkBookingDate($newStartTime, $newEndTime, $service_id);

	if ($count == 0 || $count < $number_of_works) {

		$sql = "INSERT INTO booking(service_id, customer_id, booking_date, speacial_request, booking_price, is_deleted, date_updated, end_time, status) 
		VALUES('$service_id', '$customer_id', '$newStartTime', '$speacial_request', '$booking_price', 0, now(), '$newEndTime', 0)";
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

	$sql = "INSERT INTO customer(name, email, phone, nic, address, gender, password, is_deleted) VALUES('$name', '$email', '$phone', '$nic', '$address', '$gender', '$password', 0 )";
	return mysqli_query($con, $sql);
	
}

?>