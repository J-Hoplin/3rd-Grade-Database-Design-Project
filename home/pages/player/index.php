<?php

include_once "../../common/common.php";
include_once "../../app/player/player.php";

$obj = new Player();

$total_players = (int)($obj->getplayercount()[0]["COUNT(*)"]);
$total_paginations = (int)($total_players / PAGINATION);

# If data's count is in the case of not separating -> add 1 page for rest of datas
if($total_players % PAGINATION){
    $total_paginations += 1;
}

// If page information not mention in parameter -> consider as page 1
$page_number = $_GET['page'] ?: 1;

// Page value for left page btn : '<'
$left_btn = (($page_number - 1 ) < 1) ? $total_paginations : $page_number - 1;
// Page value for right page btn : '>'
$right_btn = (($page_number + 1) > $total_paginations) ? 1 : $page_number + 1;

// Make pagination range
// If page number is multiple of PAGINATION
$range_base_number = (int)($page_number % PAGINATION) ? (int)($page_number / PAGINATION) * 10 : (int)($page_number / PAGINATION) - 1;
// Pagination range start number
// If page number is multiple of PAGINATION
$pagination_range_start = $range_base_number + 1;
// Pagination range end number -> Return minimum value compare with total_paginations and pagination_range_end number
$pagination_range_end = min($total_paginations, $range_base_number + 10);

// Tab movenent btn : '<<'
$left_tab_btn = $pagination_range_start - PAGINATION < 1 ? $total_paginations : $pagination_range_start - PAGINATION;
// Tab movenent btn : '>>'
$right_tab_btn = $pagination_range_start + PAGINATION > $total_paginations ? 1 : $pagination_range_start + PAGINATION;

Header::render();

?>
<div class="team-main">
    <?php
    title_player::title();
    ?>

    <div class="team-main__column">
        <style type="text/css">

        </style>
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-baqh">선수 명</th>
                <th class="tg-baqh">팀</th>
                <th class="tg-baqh">포지션</th>
                <th class="tg-baqh">소속 리그</th>
                <th class="tg-baqh">등번</th>
                <th class="tg-baqh">키</th>
                <th class="tg-baqh">몸무게</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // pagination parameter
            $content_pagination_param = PAGINATION * ($page_number - 1);
            // Get player list
            $playerlist = $obj->getplayerlist_pagination($content_pagination_param);
            foreach ($playerlist as $key => $value){
                $teamid = $value['TEAMID'];
                $playerlist[$key]['TEAMID'] = $obj->getteamname($teamid)[0]['TEAMNAME'];
            }

            foreach ($playerlist as $key => $value){
                // Parse values
                $player_id = $value['PLAYERID'];
                $player_name = $value['PLAYERNAME'];
                $team_name = $value['TEAMID'];
                $position = $value['POSITION'];
                $league = $value['LEAGUETYPE'];
                $backnumber = $value['BACKNUMBER'];
                $height = $value['HEIGHT'];
                $weight = $value['WEIGHT'];

                // echo statement
                echo '<tr>
                <td class="tg-baqh">
                    <a href="'.PAGES_PATH."/player/playerinfo.php?player_id=".$player_id.'">'.$player_name.'</a>
                </td>
                <td class="tg-baqh">'.$team_name.'</td>
                <td class="tg-baqh">'.$position.'</td>
                <td class="tg-baqh">'.$league.'</td>
                <td class="tg-baqh">'.$backnumber.'</td>
                <td class="tg-baqh">'.$height.'</td>
                <td class="tg-baqh">'.$weight.'</td>
            </tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="table__page">

        <?php
        echo '<span class="table__page__margin__right"><a href="'.$_SERVER['PHP_SELF']."?page=".$left_tab_btn.'"><<</a></span>';
        echo '<span class="table__page__margin__right"><a href="'.$_SERVER['PHP_SELF']."?page=".$left_btn.'"><</a></span>';
        for($i = $pagination_range_start; $i <= $pagination_range_end;$i++){
            // highlight page number of now
            if($i == $page_number){
                echo '<span class="page__now"><a href="'.$_SERVER['PHP_SELF']."?page=".$i.'">'.$i.'</a></span>';
            }else{
                echo '<span><a href="'.$_SERVER['PHP_SELF']."?page=".$i.'">'.$i.'</a></span>';
            }
        }

        echo '<span class="table__page__margin__left"><a href="'.$_SERVER['PHP_SELF']."?page=".$right_btn.'">></a></span>';
        echo '<span class="table__page__margin__left"><a href="'.$_SERVER['PHP_SELF']."?page=".$right_tab_btn.'">>></a></span>';
        ?>
    </div>

</div>

<?php
Footer::render();
?>
