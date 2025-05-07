<?php
/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
    Author : 김지유
    LastUpdate : 2022-11-01
ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/

// JSMin.php 파일 불러옴
require_once SET_PLUGIN."/JShrink/Minifier.php";
/* https://github.com/tedious/JShrink */

// print(JSMin);

/* 과거의 버전
function jsminS(){

    $filname = SET_SRC.'/k_banal.js';

    if(file_exists($filname)){

        $js = ''; // js파일
        $f = fopen($filname,'r'); // 파일을 열음
        while($part = fread($f,filesize(SET_SRC.'/k_banal.js'))) $js .= $part; // fread(파일위치,파일크기) 가져오고 $js에 저장
    
        // 코드를 최소화 시키고 변수에 저장함
        $min = \JShrink\Minifier::minify($js);
    
        // 최소한 코드를 다시 저장해줌
        $f = fopen(SET_ROOT_JS.'/kjy_min.js',"w+"); // w+는 읽고 쓰기
        flock($f,LOCK_EX); // 파일을 쓸때 파일을 잠금 깨지는것을 방지
        fwrite($f,$min);
        flock($f,LOCK_UN); // 잠금 해제
        fclose($f);

    }else{

        echo "src폴더에 k_banal.js 파일이 없습니다";

    }

}
*/

function jsminS($jsminFile){ // min으로 변환

    $filname = $jsminFile;

    if(file_exists($filname)){

        $js = ''; // js파일
        $f = fopen($filname,'r'); // 파일을 열음
        while( $part = fread( $f,filesize($jsminFile) ) ){  // fread(파일위치,파일크기) 가져오고 $js에 저장
            $js .= $part; 
        }
    
        // 코드를 최소화 시키고 변수에 저장함
        $min = \JShrink\Minifier::minify($js);

        return $min;

    }else {
        echo "파일이 없거나 오류가 발생했습니다";
    }

}

function jsMinify(){ //파일을 열어 JS파일을 읽음
    
    $src = SET_SRC; // SRC폴더 경로

    if(is_dir($src)){ // src폴더가 있는지 확인

        $jsSrc = SET_SRC.'/js';

        if(is_dir($jsSrc)){ // JS폴더가 있는지 확인

            if($dh_js = opendir($jsSrc)){ // 폴더를 열어봄

                $min = '';

                while ( ($dir = readdir($dh_js)) !== false ){

                    if($dir == "." || $dir ==".."){
                        continue; // 리눅스는 . 과 .. 이 포함되기 때문에 . 과 .. 일경우 건너뜀
                    }

                    if($dh_file = opendir($jsSrc."/".$dir)){ // js폴더 안에 js파일 체크
                        while ( ($dh_files = readdir($dh_file)) !== false ){

                            if($dh_files == "." || $dh_files ==".."){
                                continue; // 리눅스는 . 과 .. 이 포함되기 때문에 . 과 .. 일경우 건너뜀
                            }
                            
                            // $jsSrc."/".$dir."/".$dh_files 경로
                            
                            $min = $min.jsminS($jsSrc."/".$dir."/".$dh_files);

                        }
                        
                        closedir($dh_file); // 폴더 닫음

                    }

                }
                closedir($dh_js); // 폴더 닫음

            }

            if(is_dir(SET_ROOT_JS)){
                
                // 최소한 코드를 다시 저장해줌
                $f = fopen(SET_ROOT_JS.'/kjy_min.js',"w+"); // w+는 읽고 쓰기
                flock($f,LOCK_EX); // 파일을 쓸때 파일을 잠금 깨지는것을 방지
                fwrite($f,$min);
                flock($f,LOCK_UN); // 잠금 해제
                fclose($f);

            }else{

                echo "상위에 js폴더가 존재하지 않습니다";

            }
            
        }
        else{

            echo "src폴더 안에 js폴더가 없습니다";

        }

    }else { 
        echo "src폴더가 없습니다";
    };

    // echo $filname;

}

if($jsmin_start) jsMinify();

?>