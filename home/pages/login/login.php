<?php
include_once "../../common/common.php";
include_once "../../app/login/member.php";
include_once dirname(__FILE__)."/../../common/validator.php";

// Invalid access : access after login
if(strtoupper($_SERVER['REQUEST_METHOD']) == "GET"){
    if(isset($_SESSION['id']) and isset($_SESSION['username'])){
        header("Location: ../../index.php");
    }
}
// Form processing
if(strtoupper($_SERVER['REQUEST_METHOD']) == "POST"){
    $obj = new Member();
    // if it's signup
    if(isset($_POST['signup'])){
        $username = $_POST['signup']['username'];
        $email = $_POST['signup']['email'];
        $password = $_POST['signup']['password'];
        /**
         * error message bucket
         *
         * make validation each field and add validation fail message to bucket
         */
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
            /**
             * Check if email alredy exists
             *
             * If exists -> Make enroll failure
             */
            $checkexist = $obj->checkemailenrolled($email);
            if(count($checkexist)){
                $obj->closeConnection();
                Redirect::redirectionWithAlert("Member with email $email already exists",basename(__FILE__));
            }
            /**
             * Check if username already exists
             *
             * If exists -> Make enroll failure
             */
            $checkexist = $obj->checkusernameenrolled($username);
            if(count($checkexist)){
                $obj->closeConnection();
                Redirect::redirectionWithAlert("Member with username $username already exists",basename(__FILE__));
            }

            $obj->enroll($username,$email,Member::passwordencrypt($password));
            $obj->closeConnection();
            Redirect::redirectionWithAlert("Complete to enroll!",HOME_PATH);
        }
        // If invalid form detected
        else{
            $errmsg = "Some invalid form detected\\n\\n".join("\\n\\n",$errmsg);
            $obj->closeConnection();
            Redirect::redirectionWithAlert($errmsg,basename(__FILE__));
        }
    }
    // if it's signin
    elseif (isset($_POST['signin'])){
        $username = $_POST['signin']['username'];
        $password = $_POST['signin']['password'];
        $validation = $obj->signinvalidation($username);
        // If email not exist
        if(!count($validation)){
            $obj->closeConnection();
            Redirect::redirectionWithAlert("Username $username not exist",basename(__FILE__));
        }

        if(Member::passwordencrypt($password) == $validation[0]['PASSWORD']){
            $_SESSION['id'] = $validation[0]['ID'];
            $_SESSION['username'] = $validation[0]['USERNAME'];
            $obj->closeConnection();
            Redirect::redirectionWithAlert("Welcome {$_SESSION['username']}!",HOME_PATH);
        }else{
            $obj->closeConnection();
            Redirect::redirectionWithAlert("Incorrect password!",basename(__FILE__));
        }
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
                        <input type="text" placeholder="Username" name="signup[username]" class="input" />
                        <input type="text" placeholder="Email" name="signup[email]" class="input" />
                        <input type="password" placeholder="Password" name="signup[password]" class="input" />
                        <input type="submit" class="btn" value="회원가입">
                    </form>
                </div>

                <div class="container__form container--signin">
                    <!-- form here : sing in -->
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="form">
                        <h2 class="form__title">로그인</h2>
                        <input type="text" placeholder="Username" name="signin[username]" class="input" />
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