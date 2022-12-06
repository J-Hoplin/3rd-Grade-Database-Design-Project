<?php

include_once dirname(__FILE__)."/../../template.php";

class title_player implements template_main_title{
    public static function title()
    {
        echo '<div class="calendar-main__title">
        <span>선수 기록</span>
        <span>K리그의 선수 순위, 기록, 데이터를 확인할 수 있는 공간입니다.</span>
    </div>';
    }
    public static function title_specify($playername)
    {
        echo '<div class="team-main__title">
            <span>'.$playername.' 선수 상세정보</span>
            <span>K리그의 선수 순위, 기록, 데이터를 확인할 수 있는 공간입니다.</span>
        </div>';
    }
}

?>

