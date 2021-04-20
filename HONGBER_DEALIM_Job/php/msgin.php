<?php
include "config.php";
session_start();
//error_reporting(0);

if (!isset($_SESSION['hislog']) && !isset($_SESSION['uislog']) && !isset($_SESSION['naver_access_token']) && !isset($_SESSION['kakao_access_token'])) {
    echo "<script>alert('로그인후 이용하실 수 있습니다.'); location.href='/index.php'</script>";
}
$send_id = $_GET['send_id'];
$rv_id = $_POST['rv_id']; //수신자 아이디
$subject = $_POST['subject']; // 제목
$content = $_POST['content']; // 내용
$regist_day = date("Y-m-d H:i"); // 쪽지 보낸 시간


// 수신아이디가 존재하는지
$sql = "SELECT * FROM hmatch WHERE hm_email='$rv_id'";
$res = $connect->query($sql);
$row = $res->fetch();

if ($row) {
    // message테이블에 저장
    $sql = "INSERT INTO message(send_id, rv_id, subject, content, regist_day) ";
    $sql .= "VALUES('$send_id','$rv_id','$subject','$content','$regist_day')";
    $connect->query($sql);

    $updsql = "SET @COUNT = 0;";
    $updsql = $updsql . "UPDATE message SET num = @COUNT:=@COUNT+1;";
    $connect->query($updsql);

    echo "<script>alert('전송완료'); opener.location.reload('/php/match.php'); self.close();</script>";
} else {
    echo "<script>alert('수신 아이디가 잘못되었습니다.'); opener.location.reload('/php/match.php'); self.close();</script>";
    exit;
}

$connect = null;
?>