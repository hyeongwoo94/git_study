<?php
    //require_once $_SERVER["DOCUMENT_ROOT"]."/layout/login.php";
?>
<header>
    <nav>
        <div class="lang">
            <div class="_now_lang">
                <img src="/img/lang.svg" alt="언어변경">
                <p><?php echo strtoupper($lang); ?></p> <!-- PHP에서 현재 언어 표시 -->
            </div>
            <ul class="lang_list">
                <li><a href="?lang=ko">KO</a></li>
                <li><a href="?lang=en">EN</a></li>
            </ul>
        </div>
    </nav>
</header>
<script>
	$(document).ready(function () {
        $(".lang_list").hide();

        $(".lang").on("click", function () {
            $(".lang_list").slideToggle();
        });

        // 언어 변경 시 _now_lang p의 텍스트 변경
        let currentLang = "<?php echo strtoupper($lang); ?>"; // PHP에서 현재 언어 가져오기
        $("._now_lang p").text(currentLang);


        //언어의 따른 한글,영문
        const apiKey = "922a5b7c76cda084a57416f292d4c1a8";
        const city = "Seoul";
        let langCode = "";
        if(currentLang == "KO"){
            langCode = "kr";
        }else{
            langCode = "en";
        }
        fetch(
            `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=${langCode}`
        )
            .then((response) => response.json())
            .then((data) => {
                const temp = data.main.temp;
                const weather = data.weather[0].description;
                const iconCode = data.weather[0].icon;
                const iconUrl = `https://openweathermap.org/img/wn/${iconCode}@2x.png`;

                document.getElementById("temp").innerText = ` ${temp}℃`;
                document.getElementById("description").innerText = ` ${weather}`;
                document.getElementById("icon").src = iconUrl;
            });
    });

</script>