<?php
include "config.php";
session_start();
error_reporting(0);

$h_id = $_POST["id"];
$h_pwd = $_POST["pwd"];

$hsql = "SELECT * FROM hser WHERE h_id = '$h_id' AND h_pwd = '$h_pwd'";
$hres = $connect->query($hsql);
$hrow = $hres->fetch();

$msql = "SELECT * FROM hbmaster WHERE mid = '$h_id' AND mpwd = '$h_pwd'";
$mres = $connect->query($msql);
$mrow = $mres->fetch();

if ($hrow != null || $mrow != null) {
    if ($hrow != null) {      
        $_SESSION['hislog'] = true;
        $_SESSION['hname'] = $hrow['h_name'];
        $_SESSION['hid'] = $hrow['h_id'];
        $hname = $_SESSION['hname'];

        echo "<script>alert('광고주 {$hname}님 어서오세요.'); location.href='/index.php'</script>";
    }
    if ($mrow != null) {
        $_SESSION['mislog'] = true;
        $_SESSION['mname'] = $mrow['mname'];
        $_SESSION['mid'] = $mrow['mid'];
        $mname = $_SESSION['mname'];

        echo "<script>alert('관리자 {$mname}님 어서오세요.'); location.href='/index.php'</script>";
    }
}

if ($hrow == null) {
    echo "<script>alert('아이디 혹은 비밀번호가 틀렸습니다. 다시 시도하여 주십시오.'); history.back(-1);</script>";
}

$connect = null;
?>