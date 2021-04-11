<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hongber</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/index.css">
</head>

<body>
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
  <div class="banner">
    <ul class="slides">
      <li>
        <img src="/css/image/pic1.jpg" alt="" class="img1">
      </li>
      <li>
        <img src="/css/image/pic2.jpg" alt="" class="img2">
      </li>
      <li>
        <img src="/css/image/pic3.jpg" alt="" class="img3">
      </li>
    </ul>
  </div>
  <div class="section">
    <div class="ad">
      <form>
        <a href="/html/hlogin.html">광고주</a>
        <a href="/php/ber_reg2.php">
          <div class="regist">
            <p>회원이 아니세요?</p>
          </div>
        </a>
      </form>
    </div>
    <div class="people">
      <div class="down_btn"></div>
      <form>
        <a href="/php/ulogin.php">홍버</a>
        <a href="/php/ber_reg.php">
          <div class="regist">
            <p>회원이 아니세요?</p>
          </div>
        </a>
      </form>
    </div>
  </div>
  <footer>
    <p>ⓒcopyright reserved</p>
  </footer>
  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/materialize.min.js"></script>
  <script type="text/javascript" src="/js/slideshow.js"></script>
</body>

</html>