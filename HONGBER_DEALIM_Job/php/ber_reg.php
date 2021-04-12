<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/ber_reg.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js">
	</script>
	<script type="text/javascript" src="https://static.nid.naver.com/js/naveridlogin_js_sdk_2.0.2.js" charset="utf-8">
	</script>
	<script src="https://developers.kakao.com/sdk/js/kakao.js">
	</script>
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
			if (!isset($_SESSION['hislog']) && !isset($_SESSION['uislog']) && !isset($_SESSION['mislog'])) {
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
	<div class="info_wrap">
		<form action="/php/add_user.php" method="POST">
			<input type="id" name="id" placeholder="아이디" required><br>
			<hr>
			<input type="password" name="pwd" placeholder="비밀번호"><br>
			<hr>
			<input type="password" name="rpwd" placeholder="비밀번호 확인"><br>
			<hr>
			<input type="name" name="name" placeholder="이름" required><br>
			<hr>
			<input type="tel" name="phone" placeholder="your phone number" required><br>
			<hr>
			<input type="email" name="email" placeholder="E-mail" required><br>
			<hr>
			<textarea cols="50" rows="20" placeholder="홍보하고 싶은 제품과 광고주 본인을 자신있게 어필해주세요! 홍보 정보를 담은 파일도 같이 담아주세요!" name="msg"></textarea><br>
			<hr>
			<input type="submit" value="가입" class="submit"><br>
		</form>
		<script>
			const pwd = document.getElementsByName('pwd').values;
			const rpwd = document.getElementsByName('rpwd').values;
			if (pwd != rpwd) {
				alert('비밀번호가 일치하지 않습니다.');
				window.location.replace('/php/ber_reg2.php');
			}
		</script>
	</div>
	<br>

	<!-- 네이버아이디로로그인 버튼 노출 영역 -->
	<div id="naverIdLogin">
		<?php
		// 네이버 로그인 접근토큰 요청 예제
		$client_id = "DRFaCS0hy5tsmm8uWjSH";
		$redirectURI = urlencode("http://localhost/php/naver_callback.php");
		function ngenerate_state()
		{
			$mt = microtime();
			$rand = mt_rand();
			return md5($mt . $rand);
		}
		$nstate = ngenerate_state();
		$_SESSION['naver_state'] = $nstate;
		$apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=" . $client_id . "&redirect_uri=" . $redirectURI . "&state=" . $nstate;
		?>
		<a href="<?php echo $apiURL ?>">
			<img height="50" src="http://static.nid.naver.com/oauth/big_g.PNG" /></a>
	</div>
	<br>

	<!-- 카카오아이디로로그인 버튼 노출 영역 -->
	<div id="KakaoIdLogin">
		<?php
		// 카카오 로그인 접근토큰 요청 예제	
		$app_key = "1e244097dc165fec1a765891df0be219";
		$redirect_uri = "http://localhost/php/kakao_callback.php";
		function kgenerate_state()
		{
			$mt = microtime();
			$rand = mt_rand();
			return md5($mt . $rand);
		}
		$kstate = kgenerate_state();
		$_SESSION['kakao_state'] = $kstate;
		$apiURL = "https://kauth.kakao.com/oauth/authorize?client_id=" . $app_key . "&redirect_uri=" . $redirect_uri . "&response_type=code&state=" . $kstate;
		?>
		<a href="<?php echo $apiURL ?>">
			<img id="Kakaoimg" src="https://developers.kakao.com/tool/resource/static/img/button/login/full/ko/kakao_login_medium_narrow.png"></a>
	</div>
	<!-- 카카오아이디로로그인 버튼 노출 영역 -->
</body>

</html>