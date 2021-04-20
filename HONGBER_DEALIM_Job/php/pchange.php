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
  if (empty($hpmsg)) {
    $hpmsg = "";
  }
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
  if (empty($upmsg)) {
    $upmsg = "";
  }
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
  if (empty($npmsg)) {
    $npmsg = "";
  }
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
  if (empty($kpmsg)) {
    $kpmsg = "";
  }
}
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Profile</title>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/pchange.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css">
</head>

<body>
  <!-- 상단 바 -->
  <header class="nav">
    <div class="logo">
      <a href="/index.php">
        <span>HONGBER</span><br>
      </a>
    </div>
    <div>
      <a href="/php/mypage.php">
        MY PAGE
      </a>
    </div>
    <div>
      <a href="/php/match.php">
        광고 매칭
      </a>
    </div>
    <div>
      <a href="/html/spread.html">
        광고 뿌리기
      </a>
    </div>
    <div>
      <a href="/php/pickup.php">
        광고 줍기
      </a>
    </div>
    <?php
    //일반 광고주, 홍버, 관리자가 로그인시 로그아웃을 네비게이션바에 표시
    if (!isset($_SESSION["hislog"]) && !isset($_SESSION["uislog"]) && !isset($_SESSION["mislog"])) {
    } else {
      echo '<div>';
      echo '<a href="/php/logout.php">';
      echo '로그아웃';
      echo '</a>';
      echo '</div>';
    }
    //네이버 로그인시 로그아웃을 네비게이션바에 표시
    if (!isset($_SESSION['naver_access_token'])) {
    } else {
      echo '<div>';
      echo '<a href="/php/nlogout.php">';
      echo '로그아웃';
      echo '</a>';
      echo '</div>';
    }
    //카카오 로그인시 로그아웃을 네비게이션바에 표시
    if (!isset($_SESSION['kakao_access_token'])) {
    } else {
      echo '<div>';
      echo '<a href="/php/klogout.php">';
      echo '로그아웃';
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
                  } ?>" id="ccpimg" data-title="프로필 사진" data-lightbox="example-set">
          <img src="<?php if ($profile_img != null) {
                      echo $profile_img;
                    } else {
                      echo "/css/image/bpimg.png";
                    } ?>" id="cpimg" alt="프로필사진">
        </a>
        <form enctype="multipart/form-data" action="/php/pc.php" method="POST">
          <input type="file" name="file" id="imgInp" class="edit" accept="image/gif, image/jpeg, image/png">
      </div>
    </div>
    <div class="profile_info">
      <?php
      if (!isset($_SESSION["hislog"]) && !isset($_SESSION["uislog"])) {
      } else {
      ?>
        현재 비밀번호
        <input type="password" id="cpwd" name="cpwd">
      <?php
      }
      ?>

      자기소개 수정하기
      <textarea name="cpmsg" id="cpmsg" placeholder="내 소개(최대 200자)" maxlength="200"></textarea>
    </div>
    <div class="change_btn_wrap">
      <input type="submit" value="변경" class="change_btn">
      </form>
      <input type="button" value="취소" class="cancel_btn" onclick="window.location.replace('/php/mypage.php')">
    </div>
  </section>
  <script src="/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js"></script>
  <script src="/js/thumbnail.js"></script>
  <?php
  if (!isset($_SESSION['hislog'])) {
  } else {
    echo "<script>$('#cpmsg').text('" . $hpmsg . "');</script>";
  }
  if (!isset($_SESSION['uislog'])) {
  } else {
    echo "<script>$('#cpmsg').text('" . $upmsg . "');</script>";
  }
  if (!isset($_SESSION['naver_access_token'])) {
  } else {
    echo "<script>$('#cpmsg').text('" . $npmsg . "');</script>";
  }
  if (!isset($_SESSION['kakao_access_token'])) {
  } else {
    echo "<script>$('#cpmsg').text('" . $kpmsg . "');</script>";
  }
  ?>
</body>

</html>