<?php
include "config.php";
session_start();
error_reporting(0);

$um_sd = $_POST["start_d"];
$um_ed = $_POST["end_d"];
$um_name = $_POST["name"];
$um_means = $_POST["means"];
$um_r = $_POST["resolution"];

if (!isset($_SESSION['uislog'])) {
} else {
    $um_id = $_SESSION['uid'];
}
if (!isset($_SESSION['naver_access_token'])) {
} else {
    $um_id = $_SESSION['nid'];
}
if (!isset($_SESSION['kakao_access_token'])) {
} else {
    $um_id = $_SESSION['kid'];
}

$sql = "insert into umatch (um_id, um_sd, um_ed, um_name, um_means, um_r)";
$sql = $sql . "values('$um_id', '$um_sd','$um_ed','$um_name','$um_means', '$um_r')";

if ($connect->query($sql)) {
    $usql = "SET @COUNT = 0;";
    $usql = $usql . "UPDATE hmatch SET hm_num = @COUNT:=@COUNT+1;";
    $connect->query($usql);
    echo "<script>alert('홍버 {$um_name}님 광고 매칭에 등록되었습니다.'); location.href='/php/match.php'</script>";
} else {
    echo "<script>alert('광고 매칭 등록에 실패하였습니다. 다시 시도해주세요.'); location.href='/php/match.php'</script>";
}

$connect = null;
?>