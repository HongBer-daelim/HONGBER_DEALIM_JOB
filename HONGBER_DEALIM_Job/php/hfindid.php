<?php
include "config.php";

$hname = $_POST["name"];
$hemail = $_POST["email"];
$hphone = $_POST["phone"];

$sql = "SELECT * FROM hser WHERE h_name = '$hname' AND h_email = '$hemail' AND h_phone = '$hphone'";
$res = $connect->query($sql);
$row = $res->fetch();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
    <link rel="stylesheet" href="/hongber/css/reset.css">
    <link rel="stylesheet" href="/hongber/css/findid_php.css">
    <script>
        function hclose() {
            opener.document.location.href = "/hongber/html/hlogin.html";
            self.close();
        }
    </script>
</head>

<body>
    <div id="wrap">
        <?php
        if (!empty($row)) {
            //echo "<script>alert('$hname'님의 아이디는 {$row['h_id']}입니다.); location.href='../index.php'</script>";
            echo "<p>{$hname}님의 아이디는 <br> {$row['h_id']}입니다.</p>";
        } else {
            echo "<p>등록된 사용자가 아닙니다.</p>";
        }
        ?>
        <button onclick="hclose()">닫기</button>
    </div>
</body>

</html>