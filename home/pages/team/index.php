<?php

include_once "../../common/common.php";

HeaderWithAuth::render();
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
                <th class="tg-baqh">순위</th>
                <th class="tg-baqh">클럽</th>
                <th class="tg-baqh">경기</th>
                <th class="tg-baqh">승점</th>
                <th class="tg-baqh">승</th>
                <th class="tg-baqh">무</th>
                <th class="tg-baqh">패</th>
                <th class="tg-baqh">득점</th>
                <th class="tg-baqh">실점</th>
                <th class="tg-baqh">득실</th>
                <th class="tg-baqh">최근5경기</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh"><a href="<?php echo PAGES_PATH."/team/teaminfo.php"?>">서울</a></td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">승 승 승 패 패</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
Footer::render();
?>
