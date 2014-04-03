<?php

session_start();
if (isset($_SESSION['user'])==false){
    echo "<h3> Must be logged in to view!";
    var_dump($_SESSION);
} else {
    include 'mysql.php';
    showUserPage();
}

function showUserPage(){
    $email = $_SESSION['user'];
    $user = fetchUserInfo($email);
    
}

function fetchUserInfo($email){
    global $connection;
    $query = "SELECT * FROM tblCustomer WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}