<?php
session_start()
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>광고 줍기</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/pickup.css">
</head>

<body>
    <div id="wrap">
        <header class="nav">
            <a href="/index.php">
                <div class="logo">
                    <span>HONGBER</span><br>
                </div>
            </a>
            <div>
                <a href="/php/mypage.php" class="nav_a">
                    <p class="nav_p">MY PAGE</p>
                </a>
            </div>
            <div>
                <a href="/php/match.php" class="nav_a">
                    <p class="nav_p">광고 매칭</p>
                </a>
            </div>
            <div>
                <a href="/html/spread.html" class="nav_a">
                    <p class="nav_p">광고 뿌리기</p>
                </a>
            </div>
            <div>
                <a href="/php/pickup.php" class="nav_a">
                    <p class="nav_p">광고 줍기</p>
                </a>
            </div>
            <?php
            //일반 광고주, 홍버, 관리자가 로그인시 로그아웃을 네비게이션바에 표시
            if (!isset($_SESSION["hislog"]) && !isset($_SESSION["uislog"]) && !isset($_SESSION["mislog"])) {
            } else {
                echo '<div>';
                echo '<a href="/php/logout.php" class="nav_a">';
                echo '<p class="nav_p">로그아웃</p>';
                echo '</a>';
                echo '</div>';
            }
            //네이버 로그인시 로그아웃을 네비게이션바에 표시
            if (!isset($_SESSION['naver_access_token'])) {
            } else {
                echo '<div>';
                echo '<a href="/php/nlogout.php" class="nav_a">';
                echo '<p class="nav_p">로그아웃</p>';
                echo '</a>';
                echo '</div>';
            }
            //카카오 로그인시 로그아웃을 네비게이션바에 표시
            if (!isset($_SESSION['kakao_access_token'])) {
            } else {
                echo '<div>';
                echo '<a href="/php/klogout.php" class="nav_a">';
                echo '<p class="nav_p">로그아웃</p>';
                echo '</a>';
                echo '</div>';
            }
            ?>
        </header>
        <section>
            <div class="table_wrap">
                <div class="ad_list">
                    <p>광고 목록</p>
                    <table>
                        <tr>
                            <td>광고 1</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 2</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 3</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 4</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 5</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 6</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 7</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 8</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 9</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 10</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 11</td>
                            <td class="plus_btn" onclick=""></td>
                        </tr>
                    </table>
                </div>
                <div class="arrow"></div>
                <div class="pick_list">
                    <p>주운 광고</p>
                    <table>
                        <tr>
                            <td>광고 1</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 2</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 3</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 4</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 5</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 6</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 7</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 8</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 9</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 10</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                        <tr>
                            <td>광고 11</td>
                            <td class="minus_btn" onclick=""></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>

</html>