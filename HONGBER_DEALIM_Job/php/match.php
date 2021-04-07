<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/match.css">
    <title>match</title>
</head>

<body>
    <div class="info_wrap">
        <div class="header">
            <div class="logo"></div>
            <div class="nav_wrap">
                <a href="/html/mypage.html">
                    <nav>MY PAGE</nav>
                </a>
                <a href="">
                    <nav>서비스 소개</nav>
                </a>
                <a href="#">
                    <nav>광고 매칭</nav>
                </a>
                <a href="">
                    <nav>광고 뿌리기</nav>
                </a>
                <a href="">
                    <nav>광고 줍기</nav>
                </a>
            </div>
        </div>
        <div id="match_wrap">
            <div class="hongber_li">
                <a href="/php/hser_info.php"><button class="reg_btn">등록</button></a>
                <table>
                    <thead>
                        <tr>
                            <th>광고주</th>
                            <th>홍보시작일</th>
                            <th>홍보종료일</th>
                            <th>홍BER</th>
                            <th>홍보수단</th>
                            <th>각오 한마디</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <tr>
                            <?php
                            $sql = "SELECT * FROM hmatch";
                            $result = $connect->query($sql);
                            while ($row = $result->fetch()) {
                                echo '<tr>';
                                echo '<td>' . $row['hm_num'] . '&nbsp;</td>';
                                echo '<td>' . $row['hm_sd'] . '&nbsp;</td>';
                                echo '<td>' . $row['hm_ed'] . '&nbsp;</td>';
                                echo '<td>' . $row['hm_name'] . '&nbsp;</td>';
                                echo '<td>' . $row['hm_means'] . '&nbsp;</td>';
                                echo '<td>' . $row['hm_r'] . '&nbsp;</td>';
                                echo '</tr>';
                            } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="honor_li">
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>홍보시작일</th>
                            <th>홍보종료일</th>
                            <th>홍BER</th>
                            <th>홍보수단</th>
                            <th>각오 한마디</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM umatch";
                        $result = $connect->query($sql);
                        while ($row = $result->fetch()) {
                            echo '<tr>';
                            echo '<td>' . $row['um_num'] . '&nbsp;</td>';
                            echo '<td>' . $row['um_sd'] . '&nbsp;</td>';
                            echo '<td>' . $row['um_ed'] . '&nbsp;</td>';
                            echo '<td>' . $row['um_name'] . '&nbsp;</td>';
                            echo '<td>' . $row['um_means'] . '&nbsp;</td>';
                            echo '<td>' . $row['um_r'] . '&nbsp;</td>';
                            echo '</tr>';
                        } ?>
                    </tbody>
                </table>
                <a href="/php/user_info.php"><button>등록</button></a>
            </div>
        </div>
</body>
<?php
$connect = null;
?>
</html>