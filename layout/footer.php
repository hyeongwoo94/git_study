<footer>

</footer>





<script>
AOS.init();



// 해당 섹션 바로가기 URL에서 쿼리 매개변수를 파싱합니다.
const urlParam = new URLSearchParams(window.location.search);
setTimeout(function() {
    // 'viewmore' 매개변수의 존재 여부를 확인합니다.
    if (urlParam.has('viewmore')) {
        //console.log("have");
        // 'viewmore'가 존재하면, 지정된 섹션으로 스크롤합니다.
        gsap.to(window, {
            scrollTo: {
                y: $('.section_move'),
                offsetY: 150
            },
            duration: 1,
            ease: 'power2.inOut'
        });
    }
}, 200);
</script>
</body>
</html>