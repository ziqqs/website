<?php

include 'mysql.php';
include 'sanitize.php';

$password = md5($_POST['password']);
$passwrd2 = md5($_POST['password2']);

//compare password

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$houseNumber = $_POST['houseNumber'];
$streetName = $_POST['streetName'];
$city = $_POST['city'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];

// sanitize

$query = "INSERT INTO tblCustomer VALUES ('$firstName','$lastName','$houseNumber','$streetName','$city','$postcode','$email','$password')";

mysqli_query($connection, $query);
