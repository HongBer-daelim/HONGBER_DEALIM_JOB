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
	<link rel="stylesheet" href="/css/ber_reg2.css">
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
	<div class="info_wrap">
		<form action="/php/add_hser.php" method="POST">
			<input type="id" name="id" placeholder="아이디" required><br>
			<hr>
			<input type="password" name="pwd" placeholder="비밀번호" required><br>
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
	</div>

</body>

</html>