<?php

# Get Project Root

include_once "common/common.php";

Header::render();
?>
    <div class="team-main">
        <div class="team-main__title">
            <span>홈 화면</span>
            <span>K리그의 선수 순위, 기록, 데이터 등을 검색 할 수 있는 공간입니다.</span>
        </div>
        <div class="index-main__column">
            <div class="index-main__column__bg">
                <video muted autoplay loop>
                    <source src="https://www.kleague.com/assets/videos/01_Concept/01_Concept_Background.mp4" type="video/mp4">
                </video>
                <div class="index-main__column__text">
                    <p>K리그 검색</p>
                </div>
            </div>
        </div>
    </div>

    <div class="index-main__search">
        <form action="/search" method="get">
            <input id="search-box" type="text" placeholder="팀명.. 선수명.." autocomplete="off">
            <input id="search-btn" type="submit" value="Search" autocomplete="off">
        </form>
    </div>
<?php
Footer::render();
?>