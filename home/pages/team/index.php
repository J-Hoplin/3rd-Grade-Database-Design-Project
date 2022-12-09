<?php

include_once "../../common/common.php";
include_once "../../app/team/team.php";


$obj = new Team();

# Get total count of teams
$total_teams = (int)($obj->getteamcount()[0]["COUNT(*)"]);
# Get maximum pagination counter
$total_paginations = (int)($total_teams / PAGINATION);

# If data's count is in the case of not separating -> add 1 pagination for rest of datas
if($total_teams % PAGINATION){
    $total_paginations += 1;
}

// If page information not metion in parameter -> consider as page 1
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
// << < [--------] > >>
$range_base_number = (int)($page_number % PAGINATION) ? (int)($page_number / PAGINATION) * PAGINATION : (int)($page_number / PAGINATION) - 1;
// Pagination range start number
// If page number is multiple of PAGINATION
// Number of left
$pagination_range_start = $range_base_number + 1;
// Pagination range end number -> Return minimum value compare with total_paginations and pagination_range_end number
// Number of right
$pagination_range_end = min($total_paginations, $range_base_number + PAGINATION);

// Tab movenent btn : '<<'
$left_tab_btn = $pagination_range_start - PAGINATION < 1 ? $total_paginations : $pagination_range_start - PAGINATION;
// Tab movenent btn : '>>'
$right_tab_btn = $pagination_range_start + PAGINATION > $total_paginations ? 1 : $pagination_range_start + PAGINATION;

Header::render();
?>

<div class="team-main">
    <?php
    title_team::title();
    ?>
    <div class="team-main__column">
        <style type="text/css">

        </style>
        <table class="tg">
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
            </tr>
            </thead>
            <tbody>
            <?php
            // Pagination parameter
            $content_pagination_param = PAGINATION * ($page_number - 1);
            // Get team list by pagination counter
            $teamlist = $obj->getteamlist_pagination($content_pagination_param);
            foreach ($teamlist as $key => $value){
                // Parse Values
                $teamid = $value['TEAMID'];
                $teamname = $value['TEAMNAME'];
                $league = $value['LEAGUETYPE'];
                $gamecount = $value['TOTALGAMECOUNT'];
                $winningpoint = $value['WININGPOINT'];
                $win = $value['WIN'];
                $lose = $value['LOSE'];
                $draw = $value['DRAW'];
                $score = $value['SCORE'];
                $loss = $value['LOSSPOINT'];
                $recentgames = $value['CURRENT_FIVE'];

                // echo statement
                echo '<tr>
                <td class="tg-baqh"><a href="'.PAGES_PATH."/team/teaminfo.php?team_id=".$teamid.'">'.$teamname.'</a></td>
                <td class="tg-baqh">'.$league.'</a></td>
                <td class="tg-baqh">'.$gamecount.'</td>
                <td class="tg-baqh">'.$winningpoint.'</td>
                <td class="tg-baqh">'.$win.'</td>
                <td class="tg-baqh">'.$lose.'</td>
                <td class="tg-baqh">'.$draw.'</td>
                <td class="tg-baqh">'.$score.'</td>
                <td class="tg-baqh">'.$loss.'</td>
                <td class="tg-baqh">'.$recentgames.'</td>
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
$obj->closeConnection();
?>
