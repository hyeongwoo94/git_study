$(document).ready(function () {
    let text = `HAVE YOU SEEN THIS DEVELOPER?`; // 출력할 텍스트
    let index = 0;

    function typeWriter() {
        if (index < text.length) {
            $("#typing").append(text.charAt(index)); // 한 글자씩 추가
            index++;
            setTimeout(typeWriter, 100); // 타이핑 속도 조절 (100ms)
        }
    }

    typeWriter();

    $(function () {
        $("#move_text").sortable(); // 드래그해서 순서 바꾸기 활성화
        $("#move_text2").sortable(); // 드래그해서 순서 바꾸기 활성화
        $("#move_text3").sortable(); // 드래그해서 순서 바꾸기 활성화
    });
});
