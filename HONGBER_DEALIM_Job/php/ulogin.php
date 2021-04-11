<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/login.css">
</head>

<body>
    <div class="info_wrap">
        <div class="header">
            <div class="logo"></div>
            <div class="nav_wrap">
                <a href="/php/mypage.php">
                    <nav class="nav_first">MY PAGE</nav>
                </a>
                <a href="">
                    <nav>서비스 소개</nav>
                </a>
                <a href="/php/match.php">
                    <nav>광고 매칭</nav>
                </a>
                <a href="/html/spread.html">
                    <nav>광고 뿌리기</nav>
                </a>
                <a href="/html/pickup.html">
                    <nav>광고 줍기</nav>
                </a>
                <?php
                //일반 광고주, 홍버, 관리자가 로그인시 로그아웃을 네비게이션바에 표시
                if (!isset($_SESSION["hislog"]) && !isset($_SESSION["uislog"]) && !isset($_SESSION["mislog"])) {
                } else {
                    echo '<a href="/php/logout.php">';
                    echo '<nav>로그아웃</nav>';
                    echo '</a>';
                }
                //네이버 로그인시 로그아웃을 네비게이션바에 표시
                if (!isset($_SESSION['naver_access_token'])) {
                } else {
                    echo '<a href="/php/nlogout.php">';
                    echo '<nav>로그아웃</nav>';
                    echo '</a>';
                }
                //카카오 로그인시 로그아웃을 네비게이션바에 표시
                if (!isset($_SESSION['kakao_access_token'])) {
                } else {
                    echo '<a href="/php/klogout.php">';
                    echo '<nav>로그아웃</nav>';
                    echo '</a>';
                }
                ?>
            </div>
        </div>
        <form action="/php/ulog.php" method="POST">
            <input type="text" name="id" placeholder="아이디" class="id">
            <hr>
            <input type="password" name="pwd" placeholder="비밀번호" class="password">
            <hr>
            <input type="submit" class="login_btn" value="로그인">
        </form>
        <br>
        <div id="naverIdLogin">
            <?php
            // 네이버 로그인 접근토큰 요청 예제
            $client_id = "DRFaCS0hy5tsmm8uWjSH";
            $redirectURI = urlencode("http://localhost/php/naver_callbacklogin.php");
            function ngenerate_state()
            {
                $mt = microtime();
                $rand = mt_rand();
                return md5($mt . $rand);
            }
            $state = ngenerate_state();
            $apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=" . $client_id . "&redirect_uri=" . $redirectURI . "&state=" . $state;
            ?>
            <a href="<?php echo $apiURL ?>">
                <img height="50" src="http://static.nid.naver.com/oauth/big_g.PNG" /></a>
        </div>
        <br>
        <div id="KakaoIdLogin">
            <?php
            // 카카오 로그인 접근토큰 요청 예제
            $app_key = "1e244097dc165fec1a765891df0be219";
            $redirect_uri = "http://localhost/php/kakao_callbacklogin.php";
            function kgenerate_state()
            {
                $mt = microtime();
                $rand = mt_rand();
                return md5($mt . $rand);
            }
            $state = kgenerate_state();
            $_SESSION['kakao_state'] = $state;
            $apiURL = "https://kauth.kakao.com/oauth/authorize?client_id=" . $app_key . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=" . $state;
            ?>
            <a href="<?php echo $apiURL ?>">
                <img id="Kakaoimg" src="https://developers.kakao.com/tool/resource/static/img/button/login/full/ko/kakao_login_large_narrow.png"></a>
        </div>
        <form>
            <div class="find_wrap">
                <a href="#" class="find_id">
                    아이디 찾기
                </a>
                <a href="#" class="find_password">
                    비밀번호 찾기
                </a>
                <a href="#" class="regist">
                    회원가입
                </a>
            </div>
        </form>
    </div>
</body>

</html>