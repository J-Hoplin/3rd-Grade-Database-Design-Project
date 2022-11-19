<?php

include_once __DIR__."/../../common/common.php";

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
                <th class="tg-baqh">순위</th>
                <th class="tg-baqh">선수 명</th>
                <th class="tg-baqh">팀</th>
                <th class="tg-baqh">포지션</th>
                <th class="tg-baqh">득점</th>
                <th class="tg-baqh">도움</th>
                <th class="tg-baqh">공격포인트</th>
                <th class="tg-baqh">슈팅</th>
                <th class="tg-baqh">출장</th>
                <th class="tg-baqh">교체</th>
                <th class="tg-baqh">경기당 기록</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">
                    <a href="<?php echo PAGES_PATH."/player/playerinfo.php" ?>">서해원</a>
                </td>
                <td class="tg-baqh">서울FC</td>
                <td class="tg-baqh">FW</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">0.5</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
Footer::render();
?>
