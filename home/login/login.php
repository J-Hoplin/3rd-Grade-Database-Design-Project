<?php

include_once $_SERVER['DOCUMENT_ROOT']."/home/common/common.php";

?>
<?php
Header::render();
?>
  <div class="index-main">
    <div class="index-main__top">
      <div class="index-main__top__title">
          <span>K리그 로그인</span>
          <span>K리그에 오신것을 환영합니다.</span>
      </div>
    </div>

    <div class="index-main__column">
        <div class="login-main__column">
            <div class="container right-panel-active">
                <!-- Sign Up -->
                <div class="container__form container--signup">
                  <form action="#" class="form" id="form1">
                    <h2 class="form__title">회원가입</h2>
                    <input type="text" placeholder="User" class="input" />
                    <input type="email" placeholder="Email" class="input" />
                    <input type="password" placeholder="Password" class="input" />
                    <button class="btn">회원가입</button>
                  </form>
                </div>
              
                <!-- Sign In -->
                <div class="container__form container--signin">
                  <form action="#" class="form" id="form2">
                    <h2 class="form__title">로그인</h2>
                    <input type="email" placeholder="Email" class="input" />
                    <input type="password" placeholder="Password" class="input" />
                    <a href="#" class="link">비밀번호 찾기</a>
                    <button class="btn">로그인</button>
                  </form>
                </div>
              
                <!-- Overlay -->
                <div class="container__overlay">
                  <div class="overlay">
                    <div class="overlay__panel overlay--left">
                      <button class="btn" id="signIn">로그인</button>
                    </div>
                    <div class="overlay__panel overlay--right">
                      <button class="btn" id="signUp">회원가입</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <script type="text/javascript" src="<?php echo SCRIPT_PATH."/login-form.js" ?>"></script>
    </div>
  </div>
<?php

Footer::render();

?>