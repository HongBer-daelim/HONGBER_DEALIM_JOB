<?php
include "config.php";

$h_id = $_POST["id"];
$h_pwd = $_POST["pwd"];
$h_name = $_POST["name"];
$h_phone = $_POST["phone"];
$h_email = $_POST["email"];
$h_msg = $_POST["msg"];
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<?php

$sql = "insert into hser (h_id, h_pwd, h_name, h_phone, h_email, h_msg)";
$sql = $sql . "values('$h_id','$h_pwd','$h_name','$h_phone', '$h_email', '$h_msg')";
if ($connect->query($sql)) {
    echo 'success inserting <p/>';
    echo $h_name . '님 가입 되셨습니다.<p/>';
} else {
    echo "<script>alert('회원가입에 실패하였습니다. 다시 시도해주세요.'); location.href='/html/ber_reg2.html'</script>";
}

$connect = null;
?>
</html>