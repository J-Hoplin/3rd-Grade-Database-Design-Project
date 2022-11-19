<?php

include_once __DIR__."/../../common/common.php";

Header::render();
?>

  <div class="calendar-main">
      <?php
      title_calendar::title();
      ?>
        <div class="team-main__column">
            <style type="text/css">

                </style>
                <table class="tg">
                <thead>
                  <tr>
                    <th class="tg-baqh">날짜</th>
                    <th class="tg-baqh">시간</th>
                    <th class="tg-baqh">매치센터</th>
                    <th class="tg-baqh">중계방송사</th>
                    <th class="tg-baqh">중계진</th>
                    <th class="tg-baqh">장소</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="tg-baqh">2022.10.01</td>
                    <td class="tg-baqh">14:00</td>
                    <td class="tg-baqh">서울 2 : 3 대구</td>
                    <td class="tg-baqh">SBS</td>
                    <td class="tg-baqh">캐스터: 배성재, 해설: 박지성</td>
                    <td class="tg-baqh">서울 월드컵 경기장</td>
                  </tr>
                </tbody>
                </table>
        </div>
      </div>
  </div>

<?php
Footer::render();
?>