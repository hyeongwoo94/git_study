<?php
/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
    Author : 김지유
    LastUpdate : 2022-11-01
ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/

/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/
                        // 다국어
/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/

if(!empty($lang_s)){ // 배열이 비어있지 않으면
    
    $url = SET_URL;

    if($url != '/'){
        $url = explode( '/', $url)[1];
    }

    $lc; // langCheck

    for($i=0; $i<count($lang_s); $i++){

        if($url == '/' || $url == $lang_s[0][0]){
            $lc = $lang_s[0][1];
        }else if($url == $lang_s[$i][0]){
            $lc = $lang_s[$i][1];
        }

    }

}

?>