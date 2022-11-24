<?php

include_once "../../common/common.php";

HeaderWithAuth::render();

?>

<div class="team-main">
    <div class="team-main__title">
        <span>내 정보</span>
        <span>내 정보를 확인할 수 있는 공간입니다.</span>
    </div>
    <div class="myInfo-main__column">
        <form action="" name="check">
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>이름:</span></div>
                <input id="myInfo-name" type="text" name="name" placeholder="name" autocomplete="off">
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>이메일:</span></div>
                <input id="myInfo-email" type="text" name="name" placeholder="email" autocomplete="off">
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>이메일 변경:</span></div>
                <input id="myInfo-email__change" type="text" name="name" placeholder="email-change" autocomplete="off">
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>비밀번호:</span></div>
                <input id="myInfo-pw" type="text" name="name" placeholder="pw" autocomplete="off">
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>비밀번호 변경:</span></div>
                <input id="myInfo-pw__change" type="text" name="name" placeholder="pw-change" autocomplete="off">
            </div>
            <div class="myInfo_main__column__btn">
                <input id="myInfo-btn" type="submit" value="변경" autocomplete="off">
            </div>
        </form>
    </div>
</div>

<?php

Footer::render();

?>
