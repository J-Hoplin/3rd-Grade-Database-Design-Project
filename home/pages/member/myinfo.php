<?php

include_once "../../common/common.php";
include_once "../../app/member/myinfo.php";
include_once dirname(__FILE__)."/../../common/validator.php";

/**
 * Whether it's http method is GET or POST
 *
 * complete default field of inputs
 */


// GET
if(strtoupper($_SERVER['REQUEST_METHOD']) == "GET"){
    $myinfo = new Myinfo();

    $info = $myinfo->getinformation($_SESSION['id']);
    $email = $info[0]['EMAIL'];
    $pw = $info[0]['PASSWORD'];
    $myinfo->closeConnection();
}

// POST
if(strtoupper($_SERVER['REQUEST_METHOD']) == "POST"){
    $obj = new Myinfo();

    $info = $obj->getinformation($_SESSION['id']);
    $email = $info[0]['EMAIL'];
    $pw = $info[0]['PASSWORD'];

    // Varaiable : for changed values
    $changed_email = "";
    $changed_password = "";

    // If post method for changing information
    if(isset($_POST['change'])){
        // If nothing to change
        if(!$_POST['change']['email'] and !$_POST['change']['password']){
            $obj->closeConnection();
            exit('<script>
alert("Nothing to change!");
window.location.href = "myinfo.php";
</script>');
        }

        // Check password match
        if(strcmp($pw,Myinfo::passwordencrypt($_POST['change']['previouspassword']))){
            $obj->closeConnection();
            exit('<script>
alert("Password unmatched!");
window.location.href = "myinfo.php";
</script>');
        }
        $errmsg = array();
        // If email change value entered
        if($_POST['change']['email']){
            // Validate email
            // If validaiton error occured
            if(!Validator::emailvalidator($_POST['change']['email'])){
                array_push($errmsg,INVALID_EMAIL);
            }
            // If validation success
            else{
                $changed_email = $_POST['change']['email'];
            }
        }else{
            // If user don't want to change email -> if null, update to previous email
            $changed_email = $email;
        }

        // If password change value entered
        if($_POST['change']['password']){
            // Validate password
            // If validation error occured
            if(!Validator::passwordvalidator($_POST['change']['password'])){
                array_push($errmsg,INVALID_PASSWORD);
            }
            // If validation success
            else{
                $changed_password = Myinfo::passwordencrypt($_POST['change']['password']);
            }
        }else{
            // If user want to change password need to type previous password and new password to change
            $changed_password = $pw;
        }
        // If no validation error detected
        if(!count($errmsg)){
            /**
             * Check if email exist, If exist, cancel edit
             */
            // Compare if typed password is same with previous password

            // Check if password is same with
            // strcmp -> return 0 if two string are equal
            // return -1 if string1 is less than string 2
            // return 1 if string1 is greater than string2

            // Check if password is matched
            if($_POST['change']['email']){
                $checkexist = $obj->checkemailenrolled($changed_email);
                if(count($checkexist)){
                    $obj->closeConnection();
                    exit('<script>
alert("Member with email \''.$changed_email.'\' already exists");
window.location.href = "myinfo.php";
</script>');
                }
            }
            $result = $obj->updateinfomration($_SESSION['id'],$changed_email,$changed_password);
            if(!$result){
                $obj->closeConnection();
                exit('<script>
alert("Oops! Error occured while updating information");
window.location.href = "myinfo.php";
</script>');
            }
            $obj->closeConnection();
            exit('<script>
alert("Complete to update information!");
window.location.href = "myinfo.php";
</script>');
        }
        else{
            $errmsg = "Some invalid form detected\\n\\n".join("\\n\\n",$errmsg);
            $obj->closeConnection();
            exit('<script>
alert("'.$errmsg.'");
window.location.href = "myinfo.php";
</script>');
        }
    }
}

HeaderWithAuth::render();
?>

<div class="team-main">
    <div class="team-main__title">
        <span>내 정보</span>
        <span>내 정보를 확인할 수 있는 공간입니다.</span>
    </div>
    <div class="myInfo-main__column">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="check">
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>id:</span></div>
                <input id="myInfo-name" type="text" name="name" value="<?php echo $_SESSION['id'] ?>" autocomplete="off" readonly>
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>이름:</span></div>
                <input id="myInfo-username" type="text" name="name" value="<?php echo $_SESSION['username'] ?>" autocomplete="off" readonly>
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>이메일:</span></div>
                <input id="myInfo-email" type="text" name="name" value="<?php echo $email ?>" autocomplete="off" readonly>
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>이메일 변경:</span></div>
                <input id="myInfo-email__change" type="text" name="change[email]" placeholder="email-change" autocomplete="off">
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>비밀번호 변경:</span></div>
                <input id="myInfo-pw__change" type="password" name="change[password]" placeholder="new-password" autocomplete="off">
            </div>
            <div class="myInfo_main__column__block">
                <div class="myInfo_main__column__right"><span>현재 비밀번호(필수):</span></div>
                <input id="myInfo-pw" type="password" name="change[previouspassword]" placeholder="password" autocomplete="off" required>
            </div>
            <div class="myInfo_main__column__btn">
                <input id="myInfo-btn" type="submit" value="변경" autocomplete="off">
                <input id="myInfo-btn" type="submit" value="탈퇴" autocomplete="off">
            </div>
        </form>
    </div>
</div>

<?php

Footer::render();

?>
