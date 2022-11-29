<?php

include_once "../../common/common.php";
include_once "../../app/member/withdraw.php";

HeaderWithAuth::render();

// If POST method
if(strtoupper($_SERVER['REQUEST_METHOD']) == "POST"){
    $obj = new Withdraw();

    // Get user typed value
    $typed_username = $_POST["username"];
    $typed_password = Withdraw::passwordencrypt($_POST["password"]);

    // Get real value of user

    // Get user's password with id, stored in session
    $info = $obj->getpassword($_SESSION['id']);
    $real_password = $info[0]['PASSWORD'];
    if(($typed_username == $_SESSION['username']) and ($typed_password == $real_password)){
        $result = $obj->deleteuser($_SESSION['id']);
        if(!$result){
            $obj->closeConnection();
            Redirect::redirectionWithAlert("Oops! Error occured while withdraw user!",basename(__FILE__));
        }
        $obj->closeConnection();
        // Destroy session
        session_destroy();
        Redirect::redirectionWithAlert("Complete to withdraw user! Goodbye $typed_username",HOME_PATH);
    }else{
        $obj->closeConnection();
        Redirect::redirectionWithAlert("User's information not matched!",basename(__FILE__));
    }


}

?>
<div class="team-main">
    <div class="team-main__title">
        <span>회원 탈퇴</span>
        <span>K리그 회원 탈퇴 할 수 있는 공간입니다.</span>
    </div>

    <div class="delete">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" class="form" method="post">
            <h2 class="form__title">회원 탈퇴</h2>
            <input type="text" placeholder="Username" class="input" name="username"/>
            <input type="password" placeholder="Password" class="input" name="password"/>
            <input type="submit" class="btn" value="회원 탈퇴">
        </form>
    </div>
</div>
<?php
Footer::render();
?>
