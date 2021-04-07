<?php
include "config.php";

$un_id = $_POST["id"];
$un_name = $_POST["name"];
$un_phone = $_POST["phone"];
$un_email = $_POST["email"];

$sql = "insert into unser (un_id, un_name, un_phone, un_email)";
$sql = $sql . "values('$un_id', '$un_name','$un_phone', '$un_email')";
$connect->query($sql);



$connect = null;
?>