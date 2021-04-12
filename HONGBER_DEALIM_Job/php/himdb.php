<?php
include "config.php";
session_start();
// error_reporting(0);

$hm_sd = $_POST["start_d"];
$hm_ed = $_POST["end_d"];
$hm_name = $_POST["name"];
$hm_means = $_POST["means"];
$hm_r = $_POST["resolution"];

if (!isset($_SESSION['hislog'])) {
} else {
    $hm_id = $_SESSION['hid'];
}
if (!isset($_SESSION['naver_access_token'])) {
} else {
    $hm_id = $_SESSION['nid'];
}
if (!isset($_SESSION['kakao_access_token'])) {
} else {
    $hm_id = $_SESSION['kid'];
}

$sql = "insert into hmatch (hm_id, hm_sd, hm_ed, hm_name, hm_means, hm_r)";
$sql = $sql . "values('$hm_id', '$hm_sd','$hm_ed','$hm_name','$hm_means', '$hm_r')";

if ($connect->query($sql)) {
    $usql = "SET @COUNT = 0;";
    $usql = $usql . "UPDATE hmatch SET hm_num = @COUNT:=@COUNT+1;";
    $connect->query($usql);
    echo "<script>alert('광고주 {$hm_name}님 광고 매칭에 등록되었습니다.'); location.href='/php/match.php'</script>";
} else {
    echo "<script>alert('광고 매칭 등록에 실패하였습니다. 다시 시도해주세요.'); location.href='/php/match.php'</script>";
}

$connect = null;
?>