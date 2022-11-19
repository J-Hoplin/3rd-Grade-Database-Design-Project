<?php

include_once $_SERVER['DOCUMENT_ROOT']."/home/templates/template.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/templates/main-titles/calendar/index.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/templates/main-titles/player/index.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/templates/main-titles/team/index.php";

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