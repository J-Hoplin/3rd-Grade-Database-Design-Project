<!--

header.php

only header

-->

<?php

// All of pages require session array
session_start();
include_once dirname(__FILE__)."/../common/constant.php";
include_once "template.php";

class Header implements template_header_footer {
    /**
     *
     *
     * function for template : Header
     *
     * @param $loginsection : if it's login view login btn if not view logout btn
     *
     */
    protected static function buildheader($loginsection){
        return '
        <!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/60c73f104d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="'.CSS_PATH.'/styles.css"/>
    <link rel="icon" href="https://kleague-admin-test.s3.ap-northeast-2.amazonaws.com/v1/about/K리그%20엠블럼_20220104_113757.png">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>K LEAGUE DATA</title>
</head>

<body>
<div class="index-bar">
    <div class="index-bar__column">
        <a href="'.HOME_PATH.'/index.php">
            <img class="index-bar__column__svg" src="https://www.kleague.com/assets/images/logo/logo.png" alt="K리그 로고">
        </a>
    </div>

    <div class="index-bar__column">
        <div class="index-bar__column__name">'
            .$loginsection
            .'
        </div>
    </div>
</div>

<header class="index-header">
    <div class="index-header__column">
        <a href="'.PAGES_PATH.'/team"> <span>팀</span></a>
    </div>
    <div class="index-header__column">
        <a href="'.PAGES_PATH.'/player"> <span>선수</span></a>
    </div>
    <div class="index-header__column">
        <a href="'.PAGES_PATH.'/calendar"> <span>일정</span></a>
    </div>
</header>';
    }

    public static function render(){
        $state = "";
        if(!isset($_SESSION['id']) or !isset($_SESSION['username'])){
            $state = '<span>
<a href="'.HOME_PATH.'/pages/login/login.php">login</a>
</span>';
        }else{
            $state = '
<span>
Welcome : '.$_SESSION['username'].'_'.$_SESSION['id'].'
</span>
<span>
<a href="'.HOME_PATH.'/pages/member/myinfo.php">
마이페이지
</a>
</span>
<span>
<a href="'.HOME_PATH.'/pages/login/logout.php">
로그아웃
</a>
</span>';
        }
        echo self::buildheader($state);
    }
}

// Extend class 'Header'
class HeaderWithAuth extends Header{
    public static function render()
    {
        if(!isset($_SESSION['id']) or !isset($_SESSION['username'])){
            echo '<script>
alert("로그인이 필요합니다!");
</script>
<meta http-equiv="refresh" content="0,'.HOME_PATH.'/pages/login/login.php" >';
        }

        $username = $_SESSION['username'];
        $userid = $_SESSION['id'];
        echo self::buildheader('
<span>
Welcome : '.$_SESSION['username'].'_'.$_SESSION['id'].'
</span>
<span>
<a href="'.HOME_PATH.'/pages/member/myinfo.php">
마이페이지
</a>
</span>
<span>
<a href="'.HOME_PATH.'/pages/login/logout.php">
로그아웃
</a>
</span>');
    }
}

?>