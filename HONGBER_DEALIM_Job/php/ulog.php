<?php
include "config.php";
error_reporting(0);

$u_id = $_POST["id"];
$u_pwd = $_POST["pwd"];

$usql = "SELECT * FROM user WHERE u_id = '$u_id' AND u_pwd = '$u_pwd'";
$ures = $connect->query($usql);
$urow = $ures->fetch();

$msql = "SELECT * FROM hbmaster WHERE mid = '$h_id' AND mpwd = '$h_pwd'";
$mres = $connect->query($msql);
$mrow = $mres->fetch();

if ($urow != null  || $mrow != null) {
    if ($urow != null) {
        session_start();
        $_SESSION["uislog"] = true;
        $_SESSION["uname"] = $urow['u_name'];
        $_SESSION["uid"] = $hrow['u_id'];
        $_SESSION["upwd"] = $hrow['u_pwd'];
        $uname = $_SESSION["hname"];

        echo "<script>alert('홍버 {$uname}님 어서오세요.'); location.href='/index.php'</script>";
    }
    if ($mrow != null) {
        session_start();
        $_SESSION["mislog"] = true;
        $_SESSION["mname"] = $mrow['mname'];
        $_SESSION["mid"] = $mrow['mid'];
        $_SESSION["mpwd"] = $mrow['mpwd'];
        $mname = $_SESSION["mname"];

        echo "<script>alert('관리자 {$mname}님 어서오세요.'); location.href='/index.php'</script>";
    }
}

if ($urow == null) {
    echo "<script>alert('등록되지 않은 사용자 이거나 아이디 혹은 비밀번호가 틀렸습니다. 다시 시도하여 주십시오.'); history.back(-1);</script>";
}
$connect = null;
?>