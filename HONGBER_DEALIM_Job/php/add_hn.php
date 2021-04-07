<?php
include "config.php";

$hn_id = $_POST["id"];
$hn_name = $_POST["name"];
$hn_phone = $_POST["phone"];
$hn_email = $_POST["email"];

$sql = "insert into hnser (hn_id, hn_name, hn_phone, hn_email)";
$sql = $sql . "values('$hn_id', '$hn_name','$hn_phone', '$hn_email')";
$connect->query($sql);


$connect = null;
?>