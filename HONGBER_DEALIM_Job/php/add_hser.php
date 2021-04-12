<?php
include "config.php";
error_reporting(0);

$h_id = $_POST["id"];
$h_pwd = $_POST["pwd"];
$h_name = $_POST["name"];
$h_phone = $_POST["phone"];
$h_email = $_POST["email"];
$h_msg = $_POST["msg"];

$sql = "insert into hser (h_id, h_pwd, h_name, h_phone, h_email, h_msg)";
$sql = $sql . "values('$h_id','$h_pwd','$h_name','$h_phone', '$h_email', '$h_msg')";
if ($connect->query($sql)) {
    echo "<script>alert('{$h_name}님 가입 되셨습니다.'); location.href='../index.php'</script>";
} else {
    echo "<script>alert('회원가입에 실패하였습니다. 다시 시도해주세요.'); location.href='/php/ber_reg2.php'</script>";
}

$connect = null;
?>