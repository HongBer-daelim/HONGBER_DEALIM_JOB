<?php
include "config.php";
//error_reporting(0);

$uname = $_POST["name"];
$uemail = $_POST["email"];
$uphone = $_POST["phone"];

$sql = "SELECT * FROM user WHERE u_name = '$uname' AND u_email = '$uemail' AND u_phone = '$uphone'";
$res = $connect->query($sql);
$row = $res->fetch();

$nsql = "SELECT * FROM nuser WHERE n_name = '$uname' AND n_email = '$uemail' AND n_phone = '$uphone'";
$nres = $connect->query($nsql);
$nrow = $nres->fetch();

if ($uphone == null) {
    $uphone = NULL;
    $ksql = "SELECT * FROM kuser WHERE k_name = '$uname' AND k_email = '$uemail' AND k_phone = '$uphone'";
    $kres = $connect->query($ksql);
    $krow = $kres->fetch();
}

if (!empty($row)) {
    echo "{$uname}님의 아이디는 {$row['u_id']}입니다.<br>";
} else if (!empty($nrow)) {
    echo "네이버 가입 이용자 입니다.<br>";
} else if (!empty($krow)) {
    echo "카카오 가입 이용자 입니다.<br>";
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