<?php

include_once __DIR__."/../../template.php";

class title_calendar implements template_main_title{
    public static function title()
    {
        echo '<div class="team-main__title">
        <span>일정 기록</span>
        <span>K리그의 경기 일정을 확인할 수 있는 공간입니다.</span>
    </div>';
    }
}

?>

