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
    <script>
        function findid() {
            const width = '700';
            const height = '700';

            const left = Math.ceil((window.screen.width - width) / 2);
            const top = Math.ceil((window.screen.height - height) / 2);

            window.open('/html/ufindid.html', '아이디 찾기', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top + ',' + 'toolbars=no', 'scrollbars=no');
        }

        function findpwd() {
            const width = '700';
            const height = '700';

            const left = Math.ceil((window.screen.width - width) / 2);
            const top = Math.ceil((window.screen.height - height) / 2);

            window.open('/html/ufindpwd.html', '비밀번호 찾기', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top + ',' + 'toolbars=no', 'scrollbars=no');
        }
    </script>
</head>

<body>
    <div class="info_wrap">
        <div id="wrap">
            <!-- 상단 바 -->
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
                    <a href="#" onclick="findid()" class="find_id">
                        아이디 찾기
                    </a>
                    <a href="#" onclick="findpwd()" class="find_password">
                        비밀번호 찾기
                    </a>
                    <a href="/php/ber_reg.php" class="regist">
                        회원가입
                    </a>
                </div>
            </form>
        </div>
</body>

</html>