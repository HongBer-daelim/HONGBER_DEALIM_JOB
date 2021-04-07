<?php
session_start();
include "ulog.php";
include "hlog.php";

$_SESSION["name"] = $hrow['h_name'];
$_SESSION["id"] = $hrow['h_id'];
$_SESSION["pwd"] = $hrow['h_pwd'];
$hname = $_SESSION["name"];
$hid = $_SESSION["id"];
$hpwd = $_SESSION["pwd"];
$_SESSION["uname"] = $urow['u_name'];


$_SESSION["name"] = $urow['u_name'];
$_SESSION["id"] = $hrow['u_id'];
$_SESSION["pwd"] = $hrow['u_pwd'];
$uname = $_SESSION["name"];
$uid = $_SESSION["id"];
$upwd = $_SESSION["pwd"];

?>