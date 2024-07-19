<?php

    $shippingMethod = $_POST['shippingMethod'];
	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
    $zip = $_POST['zip'];

	$conn = new mysqli('localhost','root','','ecomm');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into shipping(shippingMethod, fullName, email, phone, address, city, state, zip) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisssi", $shippingMethod, $fullName, $email, $phone, $address, $city, $state, $zip);
		$execval = $stmt->execute();
		echo $execval;
		$stmt->close();
		$conn->close();
	}
?>