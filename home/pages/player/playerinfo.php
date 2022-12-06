<?php
include_once "../../common/common.php";
include_once "../../app/player/player.php";

# If player_id not given -> Redirect Home
if(!isset($_GET['player_id'])){
    Redirect::redirectHome("Invalid request! User id not given");
}
# Get player id
$player_id = $_GET['player_id'];
$obj = new Player();

# Get player information
$player_info = $obj ->getplayerinfo_individual($player_id);

# If request with invalid player id -> Redirect Home
if(!$player_info){
    $obj->closeConnection();
    Redirect::redirectHome("Invalid request! Player id not exist");
}

$player_info = $player_info[0];

# Parse player's information
$backnumber = $player_info['BACKNUMBER'];
$name = $player_info['PLAYERNAME'];
$position = $player_info['POSITION'];
$teamname = $obj->getteamname($player_info['TEAMID'])[0]['TEAMNAME'];
$height = $player_info['HEIGHT'];
$weight = $player_info['WEIGHT'];
$birth = $player_info['BIRTH'];
$english_name = $player_info['PLAYERENGLISHNAME'];
$country = $player_info['COUNTRY'];
$league = strtoupper($player_info['LEAGUETYPE']);
$imgurl = $player_info['IMGURL'];
# Get player's previous league history
$player_history = $obj->getplayerprevhistory($player_id,PAGINATION_HISTORY);

HeaderWithAuth::render();
?>

<div class="team-main">
    <?php
    title_player::title_specify($english_name);
    ?>

    <div class="playerInfo-column">
        <div class="playerInfo-column__img">
            <div class="playerInfo-column__img__left">
                <img src="<?= $imgurl ?>" alt="">
            </div>
            <div class="playerInfo-column__img__right">
                <div class="right__number"><span>No. <?= $backnumber ?></span></div>
                <div class="right__block__bottom">
                    <div class="right__name" style="margin-right: 3px;"><span><?= $english_name ?></span></div>
                    <div class="right__position" style="margin-left: 3px;"><span><?= $position ?></span></div>
                </div>
            </div>
        </div>
        <div class="playerInfo-column__leftInfo">
            <div class="leftInfo__block">
                <span>이름</span>
                <span><?= $name ?></span>
            </div>
            <div class="leftInfo__block">
                <span>소속구단</span>
                <span><?= $teamname ?></span>
            </div>
            <div class="leftInfo__block">
                <span>배번</span>
                <span><?= $backnumber ?></span>
            </div>
            <div class="leftInfo__block">
                <span>키</span>
                <span><?= $height ?> cm</span>
            </div>
            <div class="leftInfo__block">
                <span>몸무게</span>
                <span><?= $weight ?> kg</span>
            </div>

        </div>
        <div class="playerInfo-column__rightInfo">
            <div class="rightInfo__block">
                <span>영문명</span>
                <span><?= $english_name ?></span>
            </div>
            <div class="rightInfo__block">
                <span>포지션</span>
                <span><?= $position ?></span>
            </div>
            <div class="rightInfo__block">
                <span>국적</span>
                <span><?= $country ?></span>
            </div>
            <div class="rightInfo__block">
                <span>생년월일</span>
                <span><?= $birth ?></span>
            </div>
            <div class="rightInfo__block">
                <span>리그</span>
                <span><?= $league ?></span>
            </div>
        </div>
    </div>

    <div class="team-main__column">
        <style type="text/css">

        </style>
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-baqh">리그</th>
                <th class="tg-baqh">참여</th>
                <th class="tg-baqh">승점</th>
                <th class="tg-baqh">어시스트</th>
                <th class="tg-baqh">골킥</th>
                <th class="tg-baqh">코너킥</th>
                <th class="tg-baqh">오프사이드</th>
                <th class="tg-baqh">슈팅</th>
                <th class="tg-baqh">파울</th>
                <th class="tg-baqh">실점</th>
                <th class="tg-baqh">경고</th>
                <th class="tg-baqh">퇴장</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // If player's previous league history not found
            if(!count($player_history)){
                echo '<tr>
<td colspan="12" class="tg-baqh">Player\'s previous league history not found</td>
</tr>';
            }
            else{
                foreach ($player_history as $key => $value) {
                    // Parse previous league values
                    $prev_league = $value['LEAGUENAME'];
                    $prev_participant = $value['PARTICIPANT'];
                    $prev_winningpoint = $value['WINNINGPOINT'];
                    $prev_assist = $value['ASSIST'];
                    $prev_goalkick = $value['GOALKICK'];
                    $prev_cornerkick = $value['CORNERKICK'];
                    $prev_offside = $value['OFFSIDE'];
                    $prev_shooting = $value['SHOOTING'];
                    $prev_foul = $value['FOUL'];
                    $prev_losspoint = $value['LOSSPOINT'];
                    $prev_warning = $value['WARNING'];
                    $prev_left = $value['LEFT'];

                    echo '<tr>
                <td class="tg-baqh">'.$prev_league.'</td>
                <td class="tg-baqh">'.$prev_participant.'</td>
                <td class="tg-baqh">'.$prev_winningpoint.'</td>
                <td class="tg-baqh">'.$prev_assist.'</td>
                <td class="tg-baqh">'.$prev_goalkick.'</td>
                <td class="tg-baqh">'.$prev_cornerkick.'</td>
                <td class="tg-baqh">'.$prev_offside.'</td>
                <td class="tg-baqh">'.$prev_shooting.'</td>
                <td class="tg-baqh">'.$prev_foul.'</td>
                <td class="tg-baqh">'.$prev_losspoint.'</td>
                <td class="tg-baqh">'.$prev_warning.'</td>
                <td class="tg-baqh">'.$prev_left.'</td>
            </tr>';
                }
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
<?php
Footer::render();
$obj->closeConnection();
?>

