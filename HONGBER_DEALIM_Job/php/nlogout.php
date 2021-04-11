<?php
session_start();
error_reporting(0);

$token = $_SESSION['naver_access_token'];
$headers = array(
    'Content-Type: application/json', sprintf('Authorization: Bearer %s', $token)
);
$is_post = false;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://nid.naver.com/nidlogin.logout");
curl_setopt($ch, CURLOPT_POST, $is_post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
session_destroy();
echo "<script>alert('로그아웃 되었습니다.'); location.href='/index.php'</script>";
?>