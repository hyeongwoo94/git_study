<?php
/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
    Author : 김지유
    LastUpdate : 2022-11-01
ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/

/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/
                    // 세팅
/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/

#다국어 세팅
/*
    사용법
    $lang_s = [] 안에 아무것도 넣지 않으면 사용하지 않습니다
    
    사용시
    $lang_s = [] 안에 []을 넣고 그 안에 폴더명 과 국가코드를 입력하면 사용이 가능합니다.
    
    예시
    $lang_s = [
        [
            'kor', <- 폴더명
            'ko' <- 국가코드
        ]
    ]

*/
$lang_s = [];

#scss 세팅
$scss_start = 1; // 0 일경우 사용하지 않음

#Jsminify 세팅
$jsmin_start = 0; // 0 일경우 사용하지 않음

?>