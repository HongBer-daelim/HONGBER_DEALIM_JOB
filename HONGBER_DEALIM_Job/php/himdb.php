<?php
include "config.php";
session_start();
//error_reporting(0);
if (!isset($_SESSION['hislog']) && !isset($_SESSION['uislog']) && !isset($_SESSION['naver_access_token']) && !isset($_SESSION['kakao_access_token'])) {
    echo "<script>alert('로그인후 이용하실 수 있습니다.'); location.href='/index.php'</script>";
}
$hm_name = $_POST["name"];
$hm_means = $_POST["means"];
$hm_r = $_POST["resolution"];
$hm_sd = $_POST["start_d"];
$hm_ed = $_POST["end_d"];

if (!isset($_SESSION['hislog'])) {
} else {
    $hid = $_SESSION['hid'];
    $hemail = $_SESSION['hemail'];
    $hsql = "SELECT h_pimg FROM hser WHERE h_email = '$hemail'";
    $hres = $connect->query($hsql);
    $hrow = $hres->fetch();
    $profile_img = $hrow['h_pimg'];
}

$sql = "SELECT * FROM hmatch WHERE hm_id = '$hid'";
$res = $connect->query($sql);
$row = $res->fetch();

if (empty($row)) {
    $sql = "INSERT INTO hmatch (hm_id, hm_email, hm_sd, hm_ed, hm_name, hm_means, hm_r, hm_pimg)";
    $sql = $sql . "VALUES('$hid', '$hemail', '$hm_sd', '$hm_ed', '$hm_name', '$hm_means', '$hm_r', '$profile_img')";
    $res = $connect->query($sql);

    if ($res) {
        $usql = "SET @COUNT = 0;";
        $usql = $usql . "UPDATE hmatch SET hm_num = @COUNT:=@COUNT+1;";
        $connect->query($usql);
        echo "<script>alert('광고주 {$hm_name}님 광고 매칭에 등록되었습니다.'); location.href='/php/match.php'</script>";
    } else {
        echo "<script>alert('광고 매칭 등록에 실패하였습니다. 다시 시도해주세요.'); location.href='/php/match.php'</script>";
    }
} else {
    echo "<script>alert('광고 등록은 계정당 1개입니다.'); location.href='/php/match.php'</script>";
}

$connect = null;
?>