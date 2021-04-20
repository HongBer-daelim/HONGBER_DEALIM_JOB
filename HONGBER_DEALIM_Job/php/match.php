<?php
include "config.php";
session_start();
error_reporting(0);

if (!isset($_SESSION['hislog']) && !isset($_SESSION['uislog']) && !isset($_SESSION['naver_access_token']) && !isset($_SESSION['kakao_access_token'])) {
  echo "<script>alert('로그인후 이용하실 수 있습니다.'); location.href='/index.php'</script>";
}
if (!isset($_SESSION['hislog'])) {
} else {
  $hid = $_SESSION['hid'];
  $hemail = $_SESSION['hemail'];
  $hsql = "SELECT h_pimg FROM hser WHERE h_email = '$hemail'";
  $hres = $connect->query($hsql);
  $hrow = $hres->fetch();
  $profile_img = $hrow['h_pimg'];
}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/match.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
  <script type="text/javascript" src="/js/match.js"></script>
  <title>match</title>
  <script>
    function hdinfo() {
      const width = '800';
      const height = '700';

      const left = Math.ceil((window.screen.width - width) / 2);
      const top = Math.ceil((window.screen.height - height) / 2);

      window.open('/php/hview.php', '삭제하기', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top + ',' + 'toolbars=no', 'scrollbars=no');
    }
  </script>
  <title>match</title>
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
    <div class="match_wrap">
      <?php
      if (!empty($_SESSION["uislog"]) || !empty($_SESSION['naver_access_token']) || !empty($_SESSION['kakao_access_token'])) {
      } else {
        echo "<a href='/php/hser_info.php'><button class='reg_btn'>등록</button></a>";
        echo "<a href='' onclick='hdinfo()'><button class='reg_rm_btn'>삭제</button></a>";
      }
      ?>
      <?php
      $sql = "SELECT * FROM hmatch";
      $result = $connect->query($sql);
      while ($row = $result->fetch()) {
        if (empty($row['hm_pimg'])) {
          $row['hm_pimg'] = "/css/image/bpimg.png";
        }
        echo "<div class='honor_card'>";
        echo "<div class='hm_thumb'><img src='" . $row['hm_pimg'] . "' class='mtping'></div>";
        echo "<div class='hm_info'>" . $row['hm_name'] . "<p>" . $row['hm_email'] . "</p>" . "</div>";
        echo "<div class='hm_img'>" . $row['hm_means'] . "</div>";
        echo "<div class='hm_comment'>" . $row['hm_r'] . "</div>";
        echo "<div class='hm_date'>" . "<p>" . $row['hm_sd'] . "~" . $row['hm_ed'] . "</p>" . "</div>";
        echo "<button class='send' id='send' value='" . $row['hm_email'] . "' onclick=" . '"message(this.value)">send</button>';
        echo "</div>";
      }
      ?>
    </div>
  </div>
  <script>
    function message(sednemail) {
      const width = '1000';
      const height = '650';

      const left = Math.ceil((window.screen.width - width) / 2);
      const top = Math.ceil((window.screen.height - height) / 2);

      window.open('/php/message.php?rev_email=' + sednemail, '쪽지', 'width=' + width + ', height=' + height + ', left=' + left + ', top=' + top + ',' + 'toolbars=no', 'scrollbars=no');
    }
  </script>
</body>
<?php
$connect = null;
?>

</html>