<?php

include_once "../../common/common.php";
include_once "../../app/team/team.php";

// If team_id not given -> Redirect Home
if(!isset($_GET['team_id'])){
    Redirect::redirectHome("Invalid request! Team id not given");
}

$obj = new Team();
// Get team's ID
$teamid = $_GET['team_id'];

/**
 * Team
 */
// Get team's information
$teaminfo = $obj->getteaminfo_individual($teamid)[0];
// If request with invalid team id -> Redirect Home
if(!$teaminfo){
    $obj->closeConnection();
    Redirect::redirectHome("Invalid request! Team id not exist");
}
// Get team's stadium name
$teamstadium = $obj->getteamstadium($teamid)[0]['STADIUMNAME'];

/**
 * Team's player
 */
// Get players relate to team
$teamplayers = $obj->getteaminfo_players($teamid);
// Get total count of related player
$totalplayers = (int)($obj->getteaminfo_playerscount($teamid)[0]["COUNT(*)"]);
// Get maximum pagination counter
$total_paginations = (int)($totalplayers / PAGINATION_PLAYER_TEAMPAGE);
// If data's count is in the case of not separating -> add 1 pagination for rest of datas
if($totalplayers % PAGINATION_PLAYER_TEAMPAGE){
    $total_paginations += 1;
}
// If page information not methion in parameter -> consider as page 1
$page_number = $_GET['page']?:1;
// If invalid pagination counter

if($page_number > $total_paginations or $page_number < 1){
    $page_number = 1;
}

// Page value for left page btn : '<'
$left_btn = (($page_number - 1 ) < 1) ? $total_paginations : $page_number - 1;
// Page value for right page btn : '>'
$right_btn = (($page_number + 1) > $total_paginations) ? 1 : $page_number + 1;

// Make pagination range
// If page number is multiple of PAGINATION
$range_base_number = (int)($page_number % PAGINATION_PLAYER_TEAMPAGE) ? (int)($page_number / PAGINATION_PLAYER_TEAMPAGE) * PAGINATION_PLAYER_TEAMPAGE : (int)($page_number / PAGINATION_PLAYER_TEAMPAGE) - 1;
// Pagination range start number
$pagination_range_start = $range_base_number + 1;
// Pagination range end number -> Return minimum value compare with total_paginations and pagination_range_end number
$pagination_range_end = min($total_paginations, $range_base_number + PAGINATION_PLAYER_TEAMPAGE);

// Tab movenent btn : '<<'
$left_tab_btn = $pagination_range_start - PAGINATION_PLAYER_TEAMPAGE < 1 ? $total_paginations : $pagination_range_start - PAGINATION_PLAYER_TEAMPAGE;
// Tab movenent btn : '>>'
$right_tab_btn = $pagination_range_start + PAGINATION_PLAYER_TEAMPAGE > $total_paginations ? 1 : $pagination_range_start + PAGINATION_PLAYER_TEAMPAGE;

HeaderWithAuth::render();
?>
<div class="team-main">
    <?php
    title_team::title_specify($teaminfo['TEAMNAME']);
    ?>

    <table id="team-table" class="tg">
        <thead>
        <tr>
            <th class="tg-baqh">클럽(팀)</th>
            <th class="tg-baqh">리그</th>
            <th class="tg-baqh">경기 횟수</th>
            <th class="tg-baqh">승점</th>
            <th class="tg-baqh">승</th>
            <th class="tg-baqh">무</th>
            <th class="tg-baqh">패</th>
            <th class="tg-baqh">득점</th>
            <th class="tg-baqh">실점</th>
            <th class="tg-baqh">최근5경기</th>
            <th class="tg-baqh">경기장 이름</th>
            <th class="tg-baqh">로고</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $teamname = $teaminfo['TEAMNAME'];
        $league = $teaminfo['LEAGUETYPE'];
        $gamecount = $teaminfo['TOTALGAMECOUNT'];
        $winningpoint = $teaminfo['WININGPOINT'];
        $win = $teaminfo['WIN'];
        $lose = $teaminfo['LOSE'];
        $draw = $teaminfo['DRAW'];
        $score = $teaminfo['SCORE'];
        $loss = $teaminfo['LOSSPOINT'];
        $recentgames = $teaminfo['CURRENT_FIVE'];
        $img = $teaminfo['IMGURL'];

        // echo statement
        echo '<tr>
        <td class="tg-baqh">'.$teamname.'</td>
        <td class="tg-baqh">'.$league.'</a></td>
        <td class="tg-baqh">'.$gamecount.'</td>
        <td class="tg-baqh">'.$winningpoint.'</td>
        <td class="tg-baqh">'.$win.'</td>
        <td class="tg-baqh">'.$lose.'</td>
        <td class="tg-baqh">'.$draw.'</td>
        <td class="tg-baqh">'.$score.'</td>
        <td class="tg-baqh">'.$loss.'</td>
        <td class="tg-baqh">'.$recentgames.'</td>
        <td class="tg-baqh">'.$teamstadium.'</td>
        <td class="tg-baqh">
        <img src="'.$img.'">
</td>
    </tr>';
        ?>
        </tbody>
    </table>

    <div class="team-main__column">
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-baqh">선수 명</th>
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
            $content_pagination_param = PAGINATION_PLAYER_TEAMPAGE * ($page_number - 1);
            // Get player list by pagination counter
            $playerlist = $obj->getteaminfo_players_pagination($teamid,$content_pagination_param);
            foreach ($playerlist as $key => $value){
                // Parse values
                $player_id = $value['PLAYERID'];
                $player_name = $value['PLAYERNAME'];
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
        echo '<span class="table__page__margin__right"><a href="'.$_SERVER['PHP_SELF']."?team_id=".$teamid."&page=".$left_tab_btn.'"><<</a></span>';
        echo '<span class="table__page__margin__right"><a href="'.$_SERVER['PHP_SELF']."?team_id=".$teamid."&page=".$left_btn.'"><</a></span>';
        for($i = $pagination_range_start; $i <= $pagination_range_end;$i++){
            // highlight page number of now
            if($i == $page_number){
                echo '<span class="page__now"><a href="'.$_SERVER['PHP_SELF']."?team_id=".$teamid."&page=".$i.'">'.$i.'</a></span>';
            }else{
                echo '<span><a href="'.$_SERVER['PHP_SELF']."?team_id=".$teamid."&page=".$i.'">'.$i.'</a></span>';
            }
        }

        echo '<span class="table__page__margin__left"><a href="'.$_SERVER['PHP_SELF']."?team_id=".$teamid."&page=".$right_btn.'">></a></span>';
        echo '<span class="table__page__margin__left"><a href="'.$_SERVER['PHP_SELF']."?team_id=".$teamid."&page=".$right_tab_btn.'">>></a></span>';
        ?>
    </div>
</div>

<?php
Footer::render();
$obj->closeConnection();
?>

