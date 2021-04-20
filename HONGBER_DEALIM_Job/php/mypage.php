<?php
include "config.php";
session_start();
//error_reporting(0);

if (!isset($_SESSION['hislog']) && !isset($_SESSION['uislog']) && !isset($_SESSION['naver_access_token']) && !isset($_SESSION['kakao_access_token'])) {
  echo "<script>alert('로그인후 이용하실 수 있습니다.'); location.href='/index.php'</script>";
}
if (!isset($_SESSION['hislog'])) {
} else {
  $hid = $_SESSION['hid'];
  $hname = $_SESSION['hname'];
  $hemail = $_SESSION['hemail'];
  $hsql = "SELECT * FROM hser WHERE h_id = '$hid'";
  $hres = $connect->query($hsql);
  $hrow = $hres->fetch();
  $profile_img = $hrow['h_pimg'];
  $hpmsg = $hrow['h_msg'];
}

if (!isset($_SESSION['uislog'])) {
} else {
  $uid = $_SESSION['uid'];
  $uname =  $_SESSION['uname'];
  $uemail = $_SESSION['uemail'];
  $usql = "SELECT * FROM user WHERE u_id = '$uid'";
  $ures = $connect->query($usql);
  $urow = $ures->fetch();
  $profile_img = $urow['u_pimg'];
  $upmsg = $urow['u_msg'];
}

if (!isset($_SESSION['naver_access_token'])) {
} else {
  $ntoken = $_SESSION['naver_access_token'];
  $nname = $_SESSION['nname'];
  $nemail = $_SESSION['nemail'];
  $nsql = "SELECT * FROM nuser WHERE token = '$ntoken'";
  $nres = $connect->query($nsql);
  $nrow = $nres->fetch();
  $profile_img = $nrow['n_pimg'];
  $npmsg = $nrow['n_msg'];
}

if (!isset($_SESSION['kakao_access_token'])) {
} else {
  $ktoken = $_SESSION['kakao_access_token'];
  $kname = $_SESSION['kname'];
  $kemail = $_SESSION['kemail'];
  $ksql = "SELECT * FROM kuser WHERE token = '$ktoken'";
  $kres = $connect->query($ksql);
  $krow = $kres->fetch();
  $profile_img = $krow['k_pimg'];
  $kpmsg = $krow['k_msg'];
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
    </div>
  </header>
  <section>
    <div class="profile">
      <div class="profile_img">
        <a href="<?php if ($profile_img != null) {
                    echo $profile_img;
                  } else {
                    echo "/css/image/bpimg.png";
                  } ?>" data-title="프로필 사진" data-lightbox="example-set">
          <img src="<?php if ($profile_img != null) {
                      echo $profile_img;
                    } else {
                      echo "/css/image/bpimg.png";
                    } ?>" alt="프로필사진">
        </a>
        <a href="/php/pchange.php">
          <div class="wheel_icon"></div>
        </a>
      </div>
    </div>
    <div class="profile_info">
      이름
      <input type="text" value="<?php
                                if (!empty($hname)) {
                                  echo "$hname";
                                } elseif (!empty($uname)) {
                                  echo "$uname";
                                } elseif (!empty($nname)) {
                                  echo "$nname";
                                } elseif (!empty($kname)) {
                                  echo "$kname";
                                }
                                ?>" disabled>
      이메일
      <input type="text" value="<?php
                                if (!empty($hemail)) {
                                  echo "$hemail";
                                } elseif (!empty($uemail)) {
                                  echo "$uemail";
                                } elseif (!empty($nemail)) {
                                  echo "$nemail";
                                } elseif (!empty($kemail)) {
                                  echo "$kemail";
                                }
                                ?>" disabled>
      자기소개
      <textarea type="text" id="mymsg" disabled></textarea>
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
            <td colspan="2">홍보 기간</td>
            <td>홍보 수단</td>
          </tr>
          <?php
          $sql = "SELECT * FROM mypick"; //where id = '$id';
          $result = $connect->query($sql);
          while ($row = $result->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['num'] . '</td>';
            echo '<td>' . $row['mypick_sd'] . '</td>';
            echo '<td>' . $row['mypick_ed'] . '</td>';
            echo '<td>' . $row['mypick_means'] . '</td>';
            echo '</tr>';
          }
          ?>
        </table>
      </div>
      <div class="ing" id="ing_id">
        <p class="status">진행 중</p>
        <table>
          <tr>
            <td>number</td>
            <td colspan="2">홍보 기간</td>
            <td>홍보 수단</td>
          </tr>
          <?php
          $sql = "SELECT * FROM mying";
          $result = $connect->query($sql);
          while ($row = $result->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['num'] . '</td>';
            echo '<td>' . $row['mying_sd'] . '</td>';
            echo '<td>' . $row['mying_ed'] . '</td>';
            echo '<td>' . $row['mying_means'] . '</td>';
            echo '</tr>';
          }
          ?>
        </table>
      </div>
      <div class="finish" id="finish_id">
        <p class="status">진행 완료</p>
        <table>
          <tr>
            <td>number</td>
            <td colspan="2">홍보 기간</td>
            <td>홍보 수단</td>
          </tr>
          <?php
          $sql = "SELECT * FROM myed";
          $result = $connect->query($sql);
          while ($row = $result->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['num'] . '</td>';
            echo '<td>' . $row['myed_sd'] . '</td>';
            echo '<td>' . $row['myed_ed'] . '</td>';
            echo '<td>' . $row['myed_means'] . '</td>';
            echo '</tr>';
          }
          ?>
        </table>
      </div>
    </div>
  </section>
  <script src="/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
  <script src="/js/career.js"></script>
  <?php
  if (!empty($hpmsg)) {
    //echo "$hpmsg";
    echo "<script>$('#mymsg').text('" . $hpmsg . "');</script>";
  } elseif (!empty($upmsg)) {
    //echo "$upmsg";
    echo "<script>$('#mymsg').text('" . $upmsg . "');</script>";
  } elseif (!empty($npmsg)) {
    //echo "$npmsg";
    echo "<script>$('#mymsg').text('" . $npmsg . "');</script>";
  } elseif (!empty($kpmsg)) {
    echo "$kpmsg";
    echo "<script>$('#mymsg').text('" . $kpmsg . "');</script>";
  } else {
    //echo "아직 자신의 대한 소개글이없어요! 마이페이지를 수정하여 채워보세요!";
    echo "<script>$('#mymsg').text('아직 자신의 대한 소개글이없어요! 마이페이지를 수정하여 채워보세요!');</script>";
  }
  ?>
</body>

</html>