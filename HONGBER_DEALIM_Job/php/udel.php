<?php
include "config.php";
session_start();
//error_reporting(0);

if (!isset($_SESSION['hislog']) && !isset($_SESSION['uislog']) && !isset($_SESSION['naver_access_token']) && !isset($_SESSION['kakao_access_token'])) {
    echo "<script>alert('로그인후 이용하실 수 있습니다.'); location.href='/index.php'</script>";
}
if (!isset($_SESSION['uislog'])) {
} else {
    $id = $_SESSION['uid'];
    $name = $_SESSION['uname'];
}
if (!isset($_SESSION['naver_access_token'])) {
} else {
    $id = $_SESSION['nid'];
    $name = $_SESSION['nname'];
}
if (!isset($_SESSION['kakao_access_token'])) {
} else {
    $id = $_SESSION['kid'];
    $name = $_SESSION['kname'];
}

$sql = "DELETE FROM umatch WHERE um_id = '$id' AND um_name = '$name'";
if ($connect->query($sql)) {
    echo "<script>alert('삭제되었습니다.'); opener.location.reload('/php/match.php'); self.close();</script>";
} else {
    echo "<script>alert('실패하셨습니다.'); opener.location.reload('/php/match.php'); self.close();</script>";
}
?>