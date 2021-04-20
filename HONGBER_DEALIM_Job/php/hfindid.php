<?php
include "config.php";
error_reporting(0);

$hname = $_POST["name"];
$hemail = $_POST["email"];
$hphone = $_POST["phone"];

$sql = "SELECT * FROM hser WHERE h_name = '$hname' AND h_email = '$hemail' AND h_phone = '$hphone'";
$res = $connect->query($sql);
$row = $res->fetch();

if (!empty($row)) {
    //echo "<script>alert('$hname'님의 아이디는 {$row['h_id']}입니다.); location.href='../index.php'</script>";
    echo "{$hname}님의 아이디는 {$row['h_id']}입니다.<br>";
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
            opener.document.location.href = "/html/hlogin.html";
            self.close();
        }
    </script>
</head>

<body>
    <button onclick="hclose()">닫기</button>
</body>

</html>