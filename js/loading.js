$(document).ready(function () {
    let count = 3; // 초기 카운트 값
    let isCountdownRunning = false; // 카운트다운이 이미 실행 중인지 확인

    if (!isCountdownRunning) {
        isCountdownRunning = true; // 카운트다운 시작

        $("html, body").css({ overflow: "hidden", height: "100%" }); // 스크롤 막기

        let countdown = setInterval(() => {
            count--; // 1씩 감소
            $(".loading p").text(count); // 값 업데이트

            if (count <= 0) {
                clearInterval(countdown); // 카운트가 0이 되면 종료
                $(".loading").fadeOut(() => {
                    $("html, body").css({ overflow: "auto", height: "auto" }); // 스크롤 다시 활성화
                    // console.log("카운트다운 완료");
                });
            }
        }, 1000); // 1초마다 실행
    }
});

$(document).ready(function () {
    let text = $(".loading h3 span").text(); // 텍스트 가져오기
    $(".loading h3 span").html(""); // 기존 텍스트 지우기

    // 한 글자씩 span으로 감싸기
    for (let i = 0; i < text.length; i++) {
        $(".loading h3").append(`<span>${text[i]}</span>`);
    }

    // GSAP 애니메이션 적용
    gsap.fromTo(
        ".loading h3 span",
        { y: 10, opacity: 0 }, // 초기 상태 (아래에서 투명하게 시작)
        {
            y: 0,
            opacity: 1,
            duration: 0.5,
            stagger: 0.1,
            ease: "power2.out", // 위로 올라오면서 나타남
            onComplete: function () {
                gsap.to(".loading h3 span", {
                    y: 10,
                    opacity: 0,
                    duration: 0.5,
                    stagger: 0.1,
                    delay: 0.5,
                    repeat: -1,
                    yoyo: true, // 반복 애니메이션
                });
            },
        }
    );
});
