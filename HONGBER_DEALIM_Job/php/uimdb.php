<?php
include "config.php";

$um_sd = $_POST["start_d"];
$um_ed = $_POST["end_d"];
$um_name = $_POST["name"];
$um_means = $_POST["means"];
$um_r = $_POST["resolution"];

$sql = "insert into umatch (um_sd, um_ed, um_name, um_means, um_r)";
$sql = $sql . "values('$um_sd','$um_ed','$um_name','$um_means', '$um_r')";

if ($connect->query($sql)) {
    echo 'success inserting <p/>';
    echo "<script>alert('홍버 {$um_name}님 광고 매칭에 등록되었습니다.'); location.href='/php/match.php'</script>";
} else {
    echo '광고 매칭 등록에 실패하였습니다. 다시 시도해주세요.';
}

$connect = null;
?>