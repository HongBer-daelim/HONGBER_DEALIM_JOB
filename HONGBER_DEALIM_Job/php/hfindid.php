<?php
include "config.php";
error_reporting(0);

$hname = $_POST["name"];
$hemail = $_POST["email"];
$hphone = $_POST["phone"];
echo "<script>console.log($hphone)</script>";

$nsql = "SELECT * FROM hnser WHERE hn_name = '$hname' AND hn_email = '$hemail' AND hn_phone = '$hphone'";
$nres = $connect->query($nsql);
$nrow = $nres->fetch();

if (!empty($nrow)) {
    echo "네이버로 가입한 사용자 입니다.";
} else {
    $hsql = "SELECT * FROM hser WHERE h_name = '$hname' AND h_email = '$hemail' AND h_phone = '$hphone'";
    $hres = $connect->query($hsql);
    $hrow = $hres->fetch();

    if (!empty($hrow)) {
        echo "아이디는 : " . $hrow['h_id'];
    } else {
        $ksql = "SELECT * FROM kuser WHERE k_name = '$hname' AND k_email = '$hemail'";
        $kres = $connect->query($ksql);
        $krow = $kres->fetch();

        if (!empty($krow)) {
            echo "카카오로 가입한 사용자 입니다.";
        } else {
            
        }
    }
}
?>