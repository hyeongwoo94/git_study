<?php

/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/
                    # 상수
/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/
define("SET_ROOT",$_SERVER["DOCUMENT_ROOT"]); // ROOT
define("SET_URL",$_SERVER["REQUEST_URI"]); // URL

/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/
                    # 절대경로
/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/
define("SET_ROOT_JS",SET_ROOT."/js"); // JS 위치

define("SET_SRC",SET_ROOT."/src"); // SRC 위치

define("SET_UTILS",SET_ROOT."/front"); // 유틸
define("SET_CONFIG",SET_UTILS."/config"); // 유틸 CSS 위치
define("SET_PLUGIN",SET_UTILS."/plugin"); // 플러그인
define("SET_CSS",SET_UTILS."/css"); // 유틸 CSS 위치
define("SET_JS",SET_UTILS."/js"); // 유틸 JS 위치

define("SET_LAYOUT",SET_ROOT."/layout"); // 레이아웃
define("SET_HEAD",SET_LAYOUT."/_head.php"); // 헤드
define("SET_HEADER",SET_LAYOUT."/header.php"); // 헤더
define("SET_FOOTER",SET_LAYOUT."/footer.php"); // 푸터
define("SET_END",SET_LAYOUT."/_end.php"); // 엔드

?>