<?php
/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
    Author : 김지유
    LastUpdate : 2022-07-09
ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/

require_once SET_PLUGIN."/scssphp-1.10.3/scss.inc.php";

use ScssPhp\ScssPhp\Compiler;

function sassStart(){ // 변수 안 겹치게 함수안에서 세팅

    $compiler = new Compiler(); // scssphp 의 클래스를 가져옴

    $scssdir = SET_ROOT.'/scss'; // scss path 변수로 만듬

    $compiler->setImportPaths($scssdir); // scss path 설정
    $compiler->setOutputStyle(\ScssPhp\ScssPhp\OutputStyle::COMPRESSED); // scss 컴파일을 어떤 형식으로 사용할지

    // 소스맵 생성
    $compiler->setSourceMap(Compiler::SOURCE_MAP_FILE);
    $compiler->setSourceMapOptions([
        // relative or full url to the above .map file
        'sourceMapURL' => './style.map',

        // (optional) relative or full url to the .css file
        'sourceMapFilename' => 'style.css',

        // partial path (server root) removed (normalized) to create a relative url
        'sourceMapBasepath' => '/css',

        // (optional) prepended to 'source' field entries for relocating source files
        'sourceRoot' => '/',
    ]);


    $dir = SET_ROOT."/css"; // css폴더 지정

    // scss 폴더 파일들 가져옴

    $sassfile = []; // scss파일을 배열에 추가

    if(is_dir($scssdir)){ // scss폴더가 있는지 확인

        if ($dh = opendir($scssdir)){ //scss 폴더 안에 파일을 체크

            while (($files = readdir($dh)) !== false){ // scss폴더 안에 있는 파일을 배열로 나열
                
                if($files == "." || $files ==".."){
                    continue; // 리눅스는 . 과 .. 이 포함되기 때문에 . 과 .. 일경우 건너뜀
                }

                array_push($sassfile,$files);
            }

            closedir($dh);

        }

        
        if(array_filter($sassfile)){ // scss 폴더에 아무것도 없을경우

            // scss 파일을 css로 컴파일
    
            $importfile = null; //scss 파일 정리
    
            // scss 배열을 가져와서 추가
            foreach($sassfile as $file){
                $importfile = $importfile."\"$file\" ";
            }
    
            $result = $compiler->compileString('@import '.$importfile.';'); // scss 를 변환
    
            if(isset($dir)){ //변수가 있는지 확인
    
                if (!file_exists($dir)){// 폴더가 있는지 확인
    
                    // 폴더가 없으면 폴더 생성
                    mkdir($dir,0777,true);
    
                    if(!file_exists($dir."/style.css")){ //css파일이 없으면 생성
                        $cssfile = fopen($dir."/style.css","w") or die("Unable to open file!");
                        fwrite($cssfile,$result->getCss());
                        fclose($cssfile);
                    }else{
                        //파일이 있으면 실행
                        file_put_contents($dir."/style.css",$result->getCss());
                    }  

                    if(!file_exists($dir."/style.css")){ //map파일이 없으면 생성
                        $cssfile = fopen($dir."/style.map","w") or die("Unable to open file!");
                        fwrite($cssfile,$result->getSourceMap());
                        fclose($cssfile);
                    }else{
                        //파일이 있으면 실행
                        file_put_contents($dir."/style.map",$result->getSourceMap());
                    }  

    
                }else{
                    // 폴더가 있으면 실행

                    if(!file_exists($dir."/style.css")){ //css파일이 없으면 생성
                        $cssfile = fopen($dir."/style.css","w") or die("Unable to open file!");
                        fwrite($cssfile,$result->getCss());
                        fclose($cssfile);
                    }else{
                        //파일이 있으면 실행
                        file_put_contents($dir."/style.css",$result->getCss());
                    }  

                    if(!file_exists($dir."/style.css")){ //map파일이 없으면 생성
                        $cssfile = fopen($dir."/style.map","w") or die("Unable to open file!");
                        fwrite($cssfile,$result->getSourceMap());
                        fclose($cssfile);
                    }else{
                        //파일이 있으면 실행
                        file_put_contents($dir."/style.map",$result->getSourceMap());
                    }  

                }
    
            }
    
        }else{
            echo "ERROR : SCSS폴더 안에 파일이 없습니다";
        }

    }else{
        //scss 폴더가 없을경우
        echo "ERROR : 상위에 SCSS폴더가 없습니다.";
    }
    
}

if($scss_start) sassStart(); //scss함수 실행

?>

