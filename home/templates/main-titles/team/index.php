<?php

include_once dirname(__FILE__)."/../../template.php";

class title_team implements template_main_title{
    public static function title()
    {
        echo '<div class="team-main__title">
        <span>팀 기록</span>
        <span>K리그의 팀 순위, 기록, 데이터를 확인할 수 있는 공간입니다.</span>
    </div>';
    }
    public static function title_specify($teamname){
        echo '<div class="team-main__title">
            <span>'.$teamname.'팀 상세정보</span>
            <span>K리그의 팀 순위, 기록, 데이터를 확인할 수 있는 공간입니다.</span>
        </div>';
    }
}

?>
