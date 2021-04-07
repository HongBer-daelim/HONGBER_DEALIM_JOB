<?php
include "config.php";

$u_id = $_POST["id"];
$u_pwd = $_POST["pwd"];

$sql = "SELECT * FROM user WHERE u_id = '$u_id' AND u_pwd = '$u_pwd'";
$res = $connect->query($sql);

$urow = $res->fetch();

if ($urow != null) {
    session_start();
    $_SESSION["uislog"] = true;
    $_SESSION["uname"] = $urow['u_name'];
    $_SESSION["uid"] = $hrow['u_id'];
    $_SESSION["upwd"] = $hrow['u_pwd'];
    $uname = $_SESSION["uname"];
    $uid = $_SESSION["uid"];
    $upwd = $_SESSION["upwd"];

    echo "<script>alert('홍버 {$uname}님 어서오세요.'); location.href='/index.php'</script>";
}

if ($urow == null) {
    echo "<script>alert('등록되지 않은 사용자 이거나 아이디 혹은 비밀번호가 틀렸습니다. 다시 시도하여 주십시오.'); history.back(-1);</script>";
}
$connect = null;
?>