<?php

include_once "../template.php";
include_once "calendar/index.php";
include_once "player/index.php";
include_once "team/index.php";

class title_main implements template_main_title{
    public static function title()
    {
        echo '<div class="index-main__top__title">
                <span>K리그 통합 검색</span>
                <span>K리그의 순위, 기록, 데이터를 확인할 수 있는 공간입니다.</span>
            </div>';
    }
}

?>