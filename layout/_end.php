
<script>
gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(
        /iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent
    .match(
        /BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) || navigator.maxTouchPoints == 5) {
    // 모바일일 경우 scrollsmoother 비활성화
} else {
    ScrollSmoother.create({
        smooth: 2.2,
        effects: true
    });
}

</script>