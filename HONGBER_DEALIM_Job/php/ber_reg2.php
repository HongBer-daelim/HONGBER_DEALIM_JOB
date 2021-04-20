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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		function inputPhoneNumber(obj) {
			var number = obj.value.replace(/[^0-9]/g, "");
			var phone = "";

			if (number.length < 4) {
				return number;
			} else if (number.length < 7) {
				phone += number.substr(0, 3);
				phone += "-";
				phone += number.substr(3);
			} else if (number.length < 11) {
				phone += number.substr(0, 3);
				phone += "-";
				phone += number.substr(3, 3);
				phone += "-";
				phone += number.substr(6);
			} else {
				phone += number.substr(0, 3);
				phone += "-";
				phone += number.substr(3, 4);
				phone += "-";
				phone += number.substr(7);
			}
			obj.value = phone;
		}
	</script>
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
	</header>
	<div class="info_wrap">
		<form action="/php/add_hser.php" method="POST">
			<input type="id" name="id" placeholder="아이디" required><br>
			<hr>
			<input type="password" name="pwd" id="pwd" placeholder="비밀번호" required><br>
			<hr>
			<input type="password" name="rpwd" id="rpwd" placeholder="비밀번호 확인" required><br>
			<hr>
			<input type="name" name="name" placeholder="이름" required><br>
			<hr>
			<input type="tel" name="phone" placeholder="your phone number" required onKeyup="inputPhoneNumber(this)" maxlength="13"><br>
			<hr>
			<input type="email" name="email" placeholder="E-mail" required><br>
			<hr>
			<textarea cols="50" rows="20" placeholder="홍보하고 싶은 제품과 광고주 본인을 자신있게 어필해주세요!(최대 200자)" name="msg" maxlength="200"></textarea><br>
			<hr>
			<input type="submit" value="가입" class="submit"><br>
		</form>
	</div>
	<!-- 비밀번호 일치 확인 스크립트 -->
	<script>
		$('#rpwd').focusout(function() {
			if ($('#pwd').val() != $('#rpwd').val()) {
				alert("비밀번호가 일치하지 않습니다.");
				document.getElementById('rpwd').value = "";
				$('#pwd').focus();
			} else {}
		});
	</script>
</body>

</html>