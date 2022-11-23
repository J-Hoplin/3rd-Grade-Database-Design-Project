<?php

include_once "../../common/common.php";

Header::render();
?>
<div class="team-main">
    <?php
    title_team::title_specify();
    ?>

    <table id="team-table" class="tg">
        <thead>
        <tr>
            <th class="tg-baqh">순위</th>
            <th class="tg-baqh">클럽</th>
            <th class="tg-baqh">출장</th>
            <th class="tg-baqh">승점</th>
            <th class="tg-baqh">승</th>
            <th class="tg-baqh">무</th>
            <th class="tg-baqh">패</th>
            <th class="tg-baqh">득점</th>
            <th class="tg-baqh">실점</th>
            <th class="tg-baqh">득실</th>
            <th class="tg-baqh">최근 5경기</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="tg-baqh">1</td>
            <td class="tg-baqh">
                <a href="teamInfo.html">서울FC</a>
            </td>
            <td class="tg-baqh">38</td>
            <td class="tg-baqh">76</td>
            <td class="tg-baqh">22</td>
            <td class="tg-baqh">10</td>
            <td class="tg-baqh">6</td>
            <td class="tg-baqh">57</td>
            <td class="tg-baqh">33</td>
            <td class="tg-baqh">24</td>
            <td class="tg-baqh">패 승 무 승 승</td>
        </tr>
        </tbody>
    </table>

    <div class="team-main__column">
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-baqh">번호</th>
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
                    <a href="playerInfo.html">서해원</a>
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
            <tr>
                <td class="tg-baqh">2</td>
                <td class="tg-baqh">
                    <a href="playerInfo.html">윤준호</a>
                </td>
                <td class="tg-baqh">서울FC</td>
                <td class="tg-baqh">MF</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">1</td>
                <td class="tg-baqh">0.5</td>
            </tr>
            <tr>
                <td class="tg-baqh">3</td>
                <td class="tg-baqh">
                    <a href="playerInfo.html">한정우</a>
                </td>
                <td class="tg-baqh">서울FC</td>
                <td class="tg-baqh">DF</td>
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

