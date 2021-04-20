<?php
include "config.php";
session_start();
error_reporting(0);

if (!isset($_SESSION['hislog']) && !isset($_SESSION['uislog']) && !isset($_SESSION['naver_access_token']) && !isset($_SESSION['kakao_access_token'])) {
    echo "<script>alert('로그인후 이용하실 수 있습니다.'); location.href='/index.php'</script>";
}
if (!isset($_SESSION['hislog'])) {
} else {
    $id = $_SESSION['hid'];
    $name = $_SESSION['hname'];
}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/view.css">
    <title>Document</title>
    <script>
        function slist() {
            opener.document.location.reload('php/match.php');
            self.close();
        }
    </script>
</head>

<body>
    <div class="view_wrap">
        <h1>글을 확인해보세요</h1>
        <table>
            <thead>
                <tr>
                    <th colspan="3">등록기간</th>
                    <th>작성자</th>
                    <th>홍보수단</th>
                    <th>각오한마디</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM hmatch WHERE hm_id = '$id' AND hm_name = '$name'";
                $result = $connect->query($sql);
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['hm_sd'] . "</td>";
                    echo "<td>~</td>";
                    echo "<td>" . $row['hm_ed'] . "</td>";
                    echo "<td>" . $row['hm_name'] . "</td>";
                    echo "<td>" . $row['hm_means'] . "</td>";
                    echo "<td>" . $row['hm_r'] . "</td>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

        <br><br><br>

        <table>
            <tr>
                <a href="" onclick="slist()">[목록보기] &nbsp</a>
                <a href="/php/hdel.php" onclick="return confirm('삭제하시겠습니까?');">[삭제] &nbsp</a>
            </tr>
        </table>
    </div>
</body>

</html>