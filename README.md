# HongBer

## FRONT END, BACK END
  + https://github.com/leesh9098 FRONT END
  + https://github.com/WonDaeHo FRONT END
  + https://github.com/xddsr BACK END

------------
PHP파일에서 db연결 구문은 db서버의 정보가 노출되므로 업로드하지 않았습니다.
이후에 보안문제를 해결하여 업로드 할 예정입니다.
------------

------------
서은기
## 2021-04-03~04
  + SNS로그인(네이버, 카카오 \\ 구글 제거)을 api를 이용하여 구현중 막힘이 생겨 전부 수정중.....
## 2021-04-04~05
  + 로그아웃 구현과 등록된 정보가 있을경우 팝업창이 뜨도록 구현, 팀원과 DB를 생성하고 조회하여 값을 가져오도록 협업중
## 2021-04-06~07
  + 마이페이지 구현을 위해 카카오 로그인에서 프로필사진을 가져오는 url을 확인하여 그 url을 저장하는 코드 추가, 토큰을 저장하고 이후 수정으로 로그아웃기능 구현중
## 2021-04-08~09
  + 아이디 찾기, 비밀번호 찾기 구현 중 네이버로그인의 부실점을 찾아 보완하던중 html의 형식이 부족하다 판단하여 PHP로 수정후 DB연결 확인 이후 토큰과 세션으로 로그아웃 구현 예정
## 2021-04-10
  + 네이버 SNS 회원가입 API완료 -> 로그아웃 완료 \\ 진행중 : 회원가입이 아닌 로그인만의 작동 방식 구현중
## 2021-04-11
  + 카카오 회원가입 js -> php교체후 로그인 구현중 토큰에 대한 지식부족으로 연구중
  + 로그인시 등록된 이미지를 마이페이지에서 표시하도록함, 이후 등록하지 않은 사용자의 프로필은 회색의 기본적인 프로필 사진으로 대처할 예정
## 2021-04-12
  + $_SESSION[""] 대괄호안에 큰따옴표 전부 -> 작은 따옴표
  + 매치페이지에서 등록한 유저의 아이디를 가져옴
  + 등록창에서 로그인한 사람의 이름이 자동적으로 이름칸에 들어감
  + 매칭저장db에 오토인크리즈(자동증가) -> 등록되면 숫자가 자동적으로 1부터 적용되도록 함 --> 하지만 표시되지는 않고 갯수세기용으로 사용예정
## 2021-04-13
  + 마이페이지에서 주운, 진행중인, 완료한 광고를 DB에서 검색받아 표시하는 PHP문 삽입
  + 기본적인 프로필 이미지 생성, 적용 완료
  + 현재 매치페이지 오토인크리즈가 가장앞에 표시되던걸 가입한 사용자의 아이디로 바꿈 -> 닉네임이나 이메일중 뒷부분을 '*'로 가린채 표시 생각중(회의예정)
  + 파비콘 오류가 보기 싫어서 파비콘 또한 추가
------------
원대호
## 2021-03-05
  + 홍BER프로젝트 기획 및 팀구성
## 2021-03-05~12
  + 홍BER프로젝트 스토리보드, 기획서, 일정표, 기능정의서 서류 작성
  + 1차 회의와 피드백 및 일정수정.
## 2021-03-12~19
  + 3주차 진행할 스토리보드 프레젠테이션 준비
  + 기획서, 일정표, 기능정의서, 스토리보드 프레젠테이션 진행
  + 2차 회의와 피드백 및 일정수정.(그룹화 되어있는 일정 개별 일정 소화할 수 있는 방식으로 수정.)
## 2021-03-19~26
  + 홍BER 웹 제작 시작.
  + 메인페이지 구성 논의진행 및 레이아웃 구성. 
  + input태그 활용한 로그인 페이지 레이아웃 구성 및 회원가입 페이지 레이아웃 구성.
  + CSS삽입 작업 시작.
  + 메인 페이지 기능 추가 및 경로 설정.
## 2021-03-25~04-02
  + 3차 회의와 피드백(로그인 API서비스 구현 진행 사항 확인, PHP언어 사용 결정, 메인 페이지 슬라이드 영역 추가건의, DB테이블 정의서 작성 건의)
  + match 페이지 구현 논의진행 및 레이아웃 구성.
  + DB로 전송 될 데이터를 입력하고 전송할 수 있는 user_info.php 생성 및 경로 설정.
  + DB에서 받아온 데이터 표형식으로 뿌려지게 구현.
## 2021-04-02~09
  + 4차 회의와 피드백(또 다시 일정수정...기능 정의서대로 주차별로 임무를 분담, 각 페이지 별 경로설정 미흡, 부족한 완성도)
  + 디자이너 섭외(단국대학교에서 디자인 공부하는 친구 섭외.)
  + DB에 저장된 정보출력하는 기능 구현 중 
  + match페이지 등록 된 데이터 정보를 확인하고 삭제 할 수 있도록 view.php파일 생성.
  + CSS삽입 작업 시작.
  + 
## 2021-04-18~19
  + 상단바 수정 및 matchphp에 구성된 레이아웃 전체 수정. 카드발급형식으로 바꿈. 
------------
이성훈
## 2021-03-12~18
  + 메인 페이지 구현 중
## 2021-03-19~25
  + 메인 페이지 구현 완료
## 2021-03-26~04-01
  + MY PAGE 레이아웃 구현 중
## 2021-04-02~03
  + MY PAGE 레이아웃 구현 완료
## 2021-04-04~05
  + MY PAGE 레이아웃 변경, 백엔드 요청 수리 후 구현 중
## 2021-04-06~10
  + MY PAGE 레이아웃 변경 완료, 추가 기능 구현 완료
## 2021-04-11~12
  + 광고 뿌리기, 줍기 레이아웃 구성 논의
## 2021-04-13
  + 광고 줍기 페이지 레이아웃 구현 완료
## 2021-04-16~
  + 메인 페이지 수정 중
