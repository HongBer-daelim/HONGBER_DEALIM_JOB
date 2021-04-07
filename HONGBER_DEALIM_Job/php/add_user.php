<?php
include "config.php";

$u_id = $_POST["id"];
$u_pwd = $_POST["pwd"];
$u_name = $_POST["name"];
$u_phone = $_POST["phone"];
$u_email = $_POST["email"];
$u_msg = $_POST["msg"];
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<?php

$sql = "insert into user (u_id, u_pwd, u_name, u_phone, u_email, u_msg)";
$sql = $sql . "values('$u_id','$u_pwd','$u_name','$u_phone', '$u_email', '$u_msg')";
if ($connect->query($sql)) {
    echo 'success inserting <p/>';
    echo $u_name . '님 가입 되셨습니다.<p/>';
} else {
    echo "<script>alert('회원가입에 실패하였습니다. 다시 시도해주세요.'); location.href='/html/ber_reg.html'</script>";
}

$connect = null;
?>

<br><a href="/index.php">돌아가기</a>
</html>