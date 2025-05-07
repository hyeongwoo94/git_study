<?php
session_start(); // 세션 시작

// 기본 언어 설정 (기본값을 KR로 설정)
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'ko'; // 기본값을 'kr'로 설정
}

// 사용자가 언어 변경 시 세션 업데이트
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = $_SESSION['lang']; // 현재 언어를 세션에서 가져옴
require_once $_SERVER["DOCUMENT_ROOT"]."/layout/lang.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 반응형 및 ios-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="format-detection" content="telephone=no, address=no, email=no" />
    <!-- 카톡으로 url 보낼시 나오는 이미지 설정 -->
    <!-- <meta property="og:image" content="/img/kakao_meg.jpg"> -->
    <title><?php echo $translations[$lang]['title']; ?></title>
    <!-- 파비콘 -->
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <!-- 아이콘 -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- FONT -->
    <link rel="stylesheet" href="/font/font.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- 필수 스크립트 -->
    <script src="/front/js/direct.js"></script>
    <script src="/front/plugin/jquery.js"></script>

    <!-- lib -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.3/css/OverlayScrollbars.css"
        integrity="sha512-LSGPGnehGYGsh7/QTPRwe1VGplv3tVHmlDw6hI/hrEYaaI0OBFE2x6Pdo8DdAKIkJuYfbShXwDjq/SJxbsE9Tg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"
        integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.3/js/OverlayScrollbars.min.js"
        integrity="sha512-Ae2SccSxoNp/Cn7PIlowLk8cmVyyW5aSCbrB/k08h/yYeK3zrNJ/oAJf8RK/ZD95G8KjkzPIXxKbeYPn43KC0w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>	
	<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/ScrollTrigger.min.js"></script>
    <!-- swiper 11 버전 -->
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- js -->
	<script src="/js/loading.js"></script>
	<script src="/js/common.js?ver=<?php echo time(); ?>"></script>
	<script src="/js/index.js?ver=<?php echo time(); ?>"></script>


    <!-- CSS -->
    <link rel="stylesheet" href="/css/common.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="/front/css/scroll.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="/front/css/reset.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/loding.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="/css/header.css?ver=<?php echo time(); ?>">
	<link rel="stylesheet" href="/css/index.css?ver=<?php echo time(); ?>">


    <!-- 폰트 -->
    <!-- 노토산스 링크 font-family: 'Noto Sans KR', sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- 슈트 폰트 링크 font-family: 'SUIT', sans-serif; -->
    <link href="https://cdn.jsdelivr.net/gh/sun-typeface/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
    <!-- Pretendard는 파일로 올라가져 있음 -->

  
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atma:wght@300;400;500;600;700&family=Fredericka+the+Great&family=Noto+Sans+KR:wght@100..900&display=swap" rel="stylesheet">
    <?php
        // php 문으로 경로 가져오는 값
        $fileInfo = explode("/", $_SERVER['REQUEST_URI']);
        $fileName = $fileInfo[count($fileInfo)-1];
        $folderName = $fileInfo[count($fileInfo)-2];
        // $bo_table=$_GET['bo_table'];
        $path = $_SERVER['REQUEST_URI'];
        $path_num = basename ($path, ".php");
        $path_ = explode("?", $path);
        $path2 = explode("?", $path);
        $newFileName = strtok($fileName, '?'); // 게시판 일때 필요 뒤에 ?어쩌구가 붙기 때문에
    ?>
</head>

<body class="<?php echo $lang; ?>">