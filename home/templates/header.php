<!--

header.php

only header

-->

<?php

include_once $_SERVER['DOCUMENT_ROOT']."/home/common/constant.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/templates/template.php";

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
        <div class="index-bar__column__name">
            <span>DB 실습 2조 :</span>
            <span>
          <a href="#">서해원</a>
        </span>
            <span>
          <a href="#">윤준호</a>
        </span>
            <span>
          <a href="#">한정우</a>
        </span>
            <span>'
            .$loginsection
            .'</span>
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
        echo self::buildheader('<a href="'.HOME_PATH.'/login/login.php">login</a>');
    }
}

// Extend class 'Header'
class HeaderWithAuth extends Header{
    public static function render()
    {
        // Start session
        session_start();

        if(!isset($_SESSION['username']) or !isset($_SESSION['userid'])){
            echo '<script>
alert("로그인이 필요합니다!");
</script>';
            echo '<meta http-equiv="refresh" content="0,'.HOME_PATH.'/login/login.php" >';
        }

        $username = $_SESSION['username'];
        $userid = $_SESSION['userid'];
        echo self::buildheader('<a href="'.HOME_PATH.'/login/logout.php">로그아웃</a>');
    }
}

?>