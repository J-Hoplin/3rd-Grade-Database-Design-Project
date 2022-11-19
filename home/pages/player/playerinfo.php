<?php

include_once __DIR__."/../../common/common.php";

Header::render();
?>

<div class="team-main">
    <?php
    title_player_specify::title();
    ?>

    <div class="playerInfo-column">
        <div class="playerInfo-column__img">
            <div class="playerInfo-column__img__left">
                <img src="https://kleague-admin-test.s3.ap-northeast-2.amazonaws.com/v1/player/player_20160237.png" alt="">
            </div>
            <div class="playerInfo-column__img__right">
                <div class="right__number"><span>No.11</span></div>
                <div class="right__block__bottom">
                    <div class="right__name"><span>세징야</span></div>
                    <div class="right__position"><span>FW</span></div>
                </div>
            </div>
        </div>
        <div class="playerInfo-column__leftInfo">
            <div class="leftInfo__block">
                <span>이름</span>
                <span>세징야</span>
            </div>
            <div class="leftInfo__block">
                <span>소속구단</span>
                <span>대구</span>
            </div>
            <div class="leftInfo__block">
                <span>배번</span>
                <span>11</span>
            </div>
            <div class="leftInfo__block">
                <span>키</span>
                <span>177</span>
            </div>
            <div class="leftInfo__block">
                <span>생년월일</span>
                <span>1989/11/29</span>
            </div>

        </div>
        <div class="playerInfo-column__rightInfo">
            <div class="rightInfo__block">
                <span>영문명</span>
                <span>Cesar Fernando SILVA MELO</span>
            </div>
            <div class="rightInfo__block">
                <span>포지션</span>
                <span>FW</span>
            </div>
            <div class="rightInfo__block">
                <span>국적</span>
                <span>브라질</span>
            </div>
            <div class="rightInfo__block">
                <span>몸무게</span>
                <span>74</span>
            </div>
            <div class="rightInfo__block">

            </div>
        </div>
    </div>

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
            </tbody>
        </table>
    </div>
</div>
<?php
Footer::render();
?>

