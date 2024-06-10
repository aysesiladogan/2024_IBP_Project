<?php

$vt_host="localhost";
$vt_user="root";
$vt_password="";
$vt_name="proje";

$connect=mysqli_connect($vt_host, $vt_user, $vt_password, $vt_name);

if(!$connect)
{
    die("Can not  connect to database".mysqli_connect_error());
}


?>