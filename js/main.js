document.addEventListener("DOMContentLoaded", (event) => {
    gsap.registerPlugin(ScrollTrigger);

    // 기본 애니메이션
    let tl = gsap.timeline({
        scrollTrigger: {
            trigger: ".main_se_1",
            start: "top top",
            end: "bottom top",
            scrub: 1,
            pin: true,
        },
    });

    tl.to("._img_box", {
        x: "-50%",
        duration: 2,
    }).from(
        "._text_box",
        {
            x: "50%",
            opacity: 0,
            duration: 2,
        },
        "-=1"
    );

    // 미디어쿼리 대응 (최신 문법)
    let mm = gsap.matchMedia();

    mm.add("(max-width: 768px)", () => {
        let tlMobile = gsap.timeline({
            scrollTrigger: {
                trigger: ".main_se_1",
                start: "top top",
                end: "bottom top",
                scrub: 1,
                pin: true,
            },
        });

        tlMobile
            .to("._img_box", {
                x: "-30%",
                duration: 2,
            })
            .from(
                "._text_box",
                {
                    x: "30%",
                    opacity: 0,
                    duration: 2,
                },
                "-=1"
            );

        return () => {
            // 정리(cleanup) 함수 (화면 크기가 변경될 때 기존 애니메이션 제거)
            tlMobile.kill();
        };
    });
    console.log(typeof ScrollTrigger); // "function" 또는 "object"여야 함
    console.log(typeof gsap.matchMedia); // "function"이면 정상
});
