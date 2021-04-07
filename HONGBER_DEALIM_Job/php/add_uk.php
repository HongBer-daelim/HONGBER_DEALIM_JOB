<?php
include "config.php";

ini_set('display_errors', '0');
$uk_id = $_POST["id"];
$uk_name = $_POST["name"];
$uk_email = $_POST["email"];
$uk_pimg = $_POST["pimg"];
$uk_tpimg = $_POST["tpimg"];
$uk_token = $_POST["token"];

$ssql = "SELECT * FROM kuser WHERE k_name = '$uk_name' AND k_email = '$uk_email'";
$sres = $connect->query($ssql);
$srow = $sres->fetch();

if (empty($srow)) {
    $sql = "insert into kuser (k_id, k_name, k_email, k_pimg, k_tpimg, k_token)";
    $sql = $sql . "values('U$uk_id', '$uk_name', '$uk_email', '$uk_pimg', '$uk_tpimg', '$uk_token')";
    if ($connect->query($sql)) {
        echo "<script>alert('등록완료'); location.href='../index.php'</script>";
    } else {
        echo "<script>alert('등록에 실패하였습니다. 다시 시도해주세요.'); location.href='../index.php'</script>";
    }
} else {
    echo "<script>alert('이미 등록된 유저입니다.'); location.href='../index.php'</script>";
}

$connect = null;
?>