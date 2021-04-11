<?php
include "config.php";
error_reporting(0);

$u_id = $_POST["id"];
$u_pwd = $_POST["pwd"];
$u_name = $_POST["name"];
$u_phone = $_POST["phone"];
$u_email = $_POST["email"];
$u_msg = $_POST["msg"];

$sql = "insert into user (u_id, u_pwd, u_name, u_phone, u_email, u_msg)";
$sql = $sql . "values('$u_id','$u_pwd','$u_name','$u_phone', '$u_email', '$u_msg')";
if ($connect->query($sql)) {
    echo "<script>alert('{$u_name}님 가입 되셨습니다.'); location.href='/html/ber_reg2.html'</script>";
} else {
    echo "<script>alert('회원가입에 실패하였습니다. 다시 시도해주세요.'); location.href='/html/ber_reg.html'</script>";
}

$connect = null;
?>