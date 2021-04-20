<?php
include "config.php";
session_start();
error_reporting(0);

if (!isset($_SESSION['hislog']) && !isset($_SESSION['uislog']) && !isset($_SESSION['naver_access_token']) && !isset($_SESSION['kakao_access_token'])) {
    echo "<script>alert('로그인후 이용하실 수 있습니다.'); location.href='/index.php'</script>";
}
$um_sd = $_POST["start_d"];
$um_ed = $_POST["end_d"];
$um_name = $_POST["name"];
$um_means = $_POST["means"];
$um_r = $_POST["resolution"];

if (!isset($_SESSION['uislog'])) {
} else {
    $um_id = $_SESSION['uid'];
    $um_email = $_SESSION['uemail'];
}
if (!isset($_SESSION['naver_access_token'])) {
} else {
    $um_id = $_SESSION['nid'];
    $um_email = $_SESSION['nemail'];
}
if (!isset($_SESSION['kakao_access_token'])) {
} else {
    $um_id = $_SESSION['kid'];
    $um_email = $_SESSION['kemail'];
}
$sql = "SELECT * FROM umatch WHERE um_id = '$um_id'";
$res = $connect->query($sql);
$row = $res->fetch();

if (empty($row)) {
    $sql = "INSERT INTO umatch (um_id, um_email, um_sd, um_ed, um_name, um_means, um_r)";
    $sql = $sql . "VALUES('$um_id', '$um_email', '$um_sd', '$um_ed', '$um_name', '$um_means', '$um_r')";
    $res = $connect->query($sql);

    if ($res) {
        $usql = "SET @COUNT = 0;";
        $usql = $usql . "UPDATE umatch SET um_num = @COUNT:=@COUNT+1;";
        $connect->query($usql);
        echo "<script>alert('홍버 {$um_name}님 광고 매칭에 등록되었습니다.'); location.href='/php/match.php'</script>";
    } else {
        echo "<script>alert('홍버 등록에 실패하였습니다. 다시 시도해주세요.'); location.href='/php/match.php'</script>";
    }
} else {
    echo "<script>alert('홍버 등록은 계정당 1개입니다.'); location.href='/php/match.php'</script>";
}

$connect = null;
?>