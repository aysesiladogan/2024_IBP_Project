<?php

$host="localhost";
$user="root";
$password="";
$vt="uyelik";

$connection = mysqli_connect($host, $user, $password, $vt);

if(mysqli_connect_errno()){
    echo "Error:" . mysqli_connect_error();
    exit();
}

mysqli_set_charset($connection, "UTF8");




?>