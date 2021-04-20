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
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
  <script type="text/javascript" src="/js/index.js"></script>
  <script type="text/javascript" src="/js/jquery.js"></script>
  <script type="text/javascript" src="/js/materialize.min.js"></script>
  <script type="text/javascript" src="/js/slideshow.js"></script>
</head>

<body>
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
        <a href="/php/spread.php" class="nav_a">
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
      <?php
      if (!isset($_SESSION["hislog"]) && !isset($_SESSION["uislog"]) && !isset($_SESSION["mislog"]) && !isset($_SESSION['naver_access_token']) && !isset($_SESSION['kakao_access_token'])) {
      ?>
        <div class="dropdown">
          <button class="dropbtn">login</button>
          <div class="dropdown-content">
            <a href="/html/hlogin.html">
              <p>광고주로그인</p>
            </a>
            <a href="/php/ulogin.php">
              <p>홍버로그인</p>
            </a>
            <a href="/php/ber_reg2.php">
              <p>광고주회원가입</p>
            </a>
            <a href="/php/ber_reg.php">
              <p>홍버회원가입</p>
            </a>
          </div>
        </div>
      <?php
      }
      ?>
    </header>
    <!-- 슬라이드 쇼 -->
    <div class="banner">
      <ul class="slides">
        <!-- 슬라이드 쇼 이미지 크기 높이 500px -->
        <li>
          <img src="/css/image/banner1.png" alt="" class="img1">
        </li>
        <li>
          <img src="/css/image/banner2.png" alt="" class="img2">
        </li>
        <li>
          <img src="/css/image/banner3.png" alt="" class="img3">
        </li>
      </ul>
    </div>
    <!-- 컨텐츠 영역 -->
    <div class="content_area">
      <h1>홍BER WEB 서비스 효과적으로 활용하기!</h1>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

        The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
      <p>恰恰与流行观念相反，Lorem Ipsum并不是简简单单的随机文本。它追溯于一篇公元前45年的经典拉丁著作，从而使它有着两千多年的岁数。弗吉尼亚州Hampden-Sydney大学拉丁系教授Richard McClintock曾在Lorem Ipsum段落中注意到一个涵义十分隐晦的拉丁词语，“consectetur”，通过这个单词详细查阅跟其有关的经典文学著作原文，McClintock教授发掘了这个不容置疑的出处。Lorem Ipsum始于西塞罗(Cicero)在公元前45年作的“de Finibus Bonorum et Malorum”（善恶之尽）里1.10.32 和1.10.33章节。这本书是一本关于道德理论的论述，曾在文艺复兴时期非常流行。Lorem Ipsum的第一行”Lorem ipsum dolor sit amet..”节选于1.10.32章节。</p>
    </div>
    <footer>
      <p>ⓒcopyright reserved</p>
    </footer>
  </div>
</body>

</html>