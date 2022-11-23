<?php

include_once "../../common/common.php";
include_once "../../app/login/member.php";

//// Form processing
if(strtoupper($_SERVER['REQUEST_METHOD']) == "POST"){
    $obj = new Member();
    // if it's signup
    if(isset($_POST['signup'])){
        $username = $_POST['signup']['username'];
        $email = $_POST['signup']['email'];
        $password = $_POST['signup']['password'];
        // error message
        $errmsg = array();
        // Username validation
        if(!Validator::usernamevalidator($username)){
            array_push($errmsg,INVALID_USERNAME);
        }

        // Password validation
        if(!Validator::passwordvalidator($password)){
            array_push($errmsg,INVALID_PASSWORD);
        }

        // Email validation
        if(!Validator::emailvalidator($email)){
            array_push($errmsg,INVALID_EMAIL);
        }

        /**
         * PHP에서 자바스크립트에 대해 줄바꿈을 추가해 주고 싶은경우에 \\n 을 써주어야함
         */
        if(!count($errmsg)){
            $obj->enroll($username,$email,$password);
            echo '<script>
alert("Complete to enroll!");
</script>
<meta http-equiv="refresh" content="0;'.HOME_PATH.'">';
        }else{
            $errmsg = "Some invalid form detected\\n\\n".join("\\n\\n",$errmsg);
            echo '<script>
alert("'.$errmsg.'");
</script>
<meta http-equiv="refresh" content="0; login.php">';
        }
    }
    // if it's signin
    elseif (isset($_POST['signin'])){
        echo '<script>
console.log("Sign in");
</script>';
    }
}


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
                    <!-- form here : sign up -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form">
                        <h2 class="form__title">회원가입</h2>
                        <input type="text" placeholder="User" name="signup[username]" class="input" />
                        <input type="text" placeholder="Email" name="signup[email]" class="input" />
                        <input type="password" placeholder="Password" name="signup[password]" class="input" />
                        <input type="submit" class="btn" value="회원가입">
                    </form>
                </div>

                <div class="container__form container--signin">
                    <!-- form here : sing in -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form">
                        <h2 class="form__title">로그인</h2>
                        <input type="text" placeholder="Email" name="signin[email]" class="input" />
                        <input type="password" placeholder="Password" name="signin[password]" class="input" />
                        <input type="submit" class="btn" value="로그인"/>
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