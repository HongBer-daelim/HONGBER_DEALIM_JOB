<?php
include "config.php";
error_reporting(0);

$uid = $_POST["id"];
$uname = $_POST["name"];
$uemail = $_POST["email"];
$uphone = $_POST["phone"];

$sql = "SELECT * FROM user WHERE u_id = '$uid' AND u_name = '$uname' AND u_email = '$uemail' AND u_phone = '$uphone'";
$res = $connect->query($sql);
$row = $res->fetch();

if (!empty($row)) {
    //echo "<script>alert('$uname'님의 아이디는 {$row['u_id']}입니다.); location.href='../index.php'</script>";
    echo "{$uname}님의 비밀번호는 {$row['u_pwd']}입니다.<br>";
} else {
    echo "등록된 사용자가 아닙니다.<br>";
}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function hclose() {
            opener.document.location.href = "/php/ulogin.php";
            self.close();
        }
    </script>
</head>

<body>
    <button onclick="hclose()">닫기</button>
</body>

</html>