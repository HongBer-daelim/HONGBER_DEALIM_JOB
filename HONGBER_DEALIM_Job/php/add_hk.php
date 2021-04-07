<?php
include "config.php";

ini_set('display_errors', '0');
$hk_id = $_POST["id"];
$hk_name = $_POST["name"];
$hk_email = $_POST["email"];
$hk_pimg = $_POST["pimg"];
$hk_tpimg = $_POST["tpimg"];
$hk_token = $_POST["token"];

$ssql = "SELECT * FROM kuser WHERE k_name = '$hk_name' AND k_email = '$hk_email'";
$sres = $connect->query($ssql);
$srow = $sres->fetch();

if (empty($srow)) {
    $sql = "insert into kuser (k_id, k_name, k_email, k_pimg, k_tpimg, k_token)";
    $sql = $sql . "values('H$hk_id', '$hk_name', '$hk_email', '$hk_pimg', '$hk_tpimg', '$hk_token')";
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