<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/user_info.css">
  <script type="text/javascript" src="/js/user_info.js"></script>
  <script>
  function tnn(){
    document.getElementById('tn').value = document.getElementById('tr').value.length;
  }
  </script>
  <title>Document</title>
  <style>
        table {border-collapse: collapse;}
        table,tr,td{border: 1px solid #333; padding: 5px;}
        input[type='text'] {width: 350px; margin-bottom: 5px; padding: 10px; font-size: 14px;}
    </style>
</head>
<body>
  <div class="info_wrap">
    <div class="header">
			<div class="logo"></div>
			<div class="nav_wrap">
				<a href="/html/mypage.html">
					<nav>MY PAGE</nav>
				</a>
				<a href="">
					<nav>서비스 소개</nav>
				</a>
				<a href="/php/match.php">
					<nav>광고 매칭</nav>
				</a>
				<a href="">
					<nav>광고 뿌리기</nav>
				</a>
				<a href="">
					<nav>광고 줍기</nav>
				</a>
			</div>
		</div>
  </div>
  <form action="/php/uimdb.php" method="POST">
    <div class="form_wrap">
      <p>등록기간</p>
      <input type="date" name="start_d" id="s_d"><input type="date" name="end_d" id="e_d"><br>
      <p>이름</p>
      <input type="text" name="name" placeholder="ex)홍길동(이름)" required><br>
      <p>홍보수단</p>
      <input type="text" name="means" placeholder="ex)SNS(홍보수단)" required><br>
      <p>각오 한마디</p>
      <div class="res">
        <input type="text" name="resolution" placeholder="ex(각오한마디) 최대 50자" id="tr" onkeyup="tnn()" onkeydwon="tnn()" onkeypress="tnn()" maxlength="50" required>
      </div>
      <div>
      <input type="number" id="tn" value="0" readonly><br>
      <input type="submit" value="등록" id="submit">
      </div>
    </div>
  </form>
  <script>
  document.getElementById('s_d').value = new Date().toISOString().substring(0, 10);
  document.getElementById('s_d').min = new Date().toISOString().substring(0, 10);
  document.getElementById('s_d').max = new Date().toISOString().substring(0, 10);
  document.getElementById('e_d').min = new Date().toISOString().substring(0, 10);
  </script>
</body>
</html>