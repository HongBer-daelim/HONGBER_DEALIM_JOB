<?php
include "config.php";
session_start();
// error_reporting(0);

if (!isset($_SESSION["hislog"]) && !isset($_SESSION["uislog"]) && !isset($_SESSION["mislog"])) {
} else {
}

if (!isset($_SESSION['naver_access_token'])) {
} else {
  $ntoken = $_SESSION['naver_access_token'];
  $nsql = "SELECT n_pimg FROM nuser WHERE token = '$ntoken'";
  $nres = $connect->query($nsql);
  $nrow = $nres->fetch();
  $profile_img = $nrow['n_pimg'];
}

if (!isset($_SESSION['kakao_access_token'])) {
} else {
  $ktoken = $_SESSION['kakao_access_token'];
  $ksql = "SELECT k_pimg FROM kuser WHERE token = '$ktoken'";
  $kres = $connect->query($ksql);
  $krow = $kres->fetch();
  $profile_img = $krow['k_pimg'];
}
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MY PAGE</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/mypage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css">


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
  <div class="profile">
    <div class="profile_img">
      <a href="<?php echo $profile_img; ?>" data-title="프로필 사진" data-lightbox="example-set">
        <img src="<?php echo $profile_img; ?>" alt="프로필사진">
      </a>
      <div class="camera_icon">
        <input type="file" name="pro_change" id="profile_change">
        <p class="blind">프로필 사진 변경</p>
    </div>
  </div>
  </div>
  <div class="profile_info">
    <input type="text" placeholder="프로필 설명 테스트입니다."></input>
    <input type="text" placeholder="프로필 설명 테스트입니다."></input>
    <input type="text" placeholder="프로필 설명 테스트입니다."></input>
  </div>
  </div>
  <div class="history">
    <div class="history_btn_wrap">
      <input type="button" name="picked" id="picked" value="주운 광고" onclick="pickFunction()">
      <input type="button" name="doing" id="doing" value="진행 중" onclick="ingFunction()">
      <input type="button" name="finished" id="finished" value="진행 완료" onclick="finFunction()">
    </div>
    <div class="pick" id="picked_id">
      <p class="status">주운 광고</p>
      <table>
        <tr>
          <td>number</td>
          <td>홍보 기간</td>
          <td>홍보 수단</td>
        </tr>
        <tr>
          <td>1</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>2</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>3</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>4</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>5</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
      </table>
    </div>
    <div class="ing" id="ing_id">
      <p class="status">진행 중</p>
      <table>
        <tr>
          <td>number</td>
          <td>홍보 기간</td>
          <td>홍보 수단</td>
        </tr>
        <tr>
          <td>1</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>2</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>3</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>4</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>5</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
      </table>
    </div>
    <div class="finish" id="finish_id">
      <p class="status">진행 완료</p>
      <table>
        <tr>
          <td>number</td>
          <td>홍보 기간</td>
          <td>홍보 수단</td>
        </tr>
        <tr>
          <td>1</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>2</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>3</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>4</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
        <tr>
          <td>5</td>
          <td>2021.03.01~2021.03.02</td>
          <td>SNS</td>
        </tr>
      </table>
    </div>
  </div>
  <script src="/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
  <script src="/js/career.js"></script>
</body>

</html>