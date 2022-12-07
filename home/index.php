<?php

include_once "common/common.php";

# Get Project Root

if(strtoupper($_SERVER['REQUEST_METHOD']) == "POST"){
    if(isset($_POST['keyword'])){
        Redirect::redirection(PAGES_PATH."/search?keyword=".$_POST['keyword']);
    }
}

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
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input id="search-box" name="keyword" type="text" placeholder="선수 이름 검색하기" autocomplete="off">
            <input id="search-btn" type="submit" value="Search" autocomplete="off">
        </form>
    </div>
<?php
Footer::render();
?>