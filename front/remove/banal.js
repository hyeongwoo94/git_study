/*ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ
    Author : 김지유
    LastUpdate : 2022-07-08
ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ*/

// 넘버 카운트 (가운데에 왔을때 실행)
$.fn.bnCount = function(countNum,speed){

    const countUp = () => {

        const target = countNum; // 최대 숫자
        const count = + $(this).text(); // 시작시간
        const speedSet = speed; // 속도
        const inc = target / speedSet;

        if (count < target){
            $(this).text(Math.ceil(count + inc));
            setTimeout(countUp,1);
        }else {
            $(this).text(target);
        }

    }

    let startCount = true;

    $(window).scroll(function(){

        let offset = $(".__bnNumber")[0].getBoundingClientRect().top;
        let winHeightCalc = window.innerHeight/2;

        if(offset < winHeightCalc){
            if(startCount) countUp();
            startCount = false;
        }else{
            // if(!startCount)
            startCount = true;
        }

    });

}

