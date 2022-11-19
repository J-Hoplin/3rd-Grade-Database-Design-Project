<!--

footer.php

only header

-->
<?php

include_once $_SERVER['DOCUMENT_ROOT']."/home/common/constant.php";
include_once $_SERVER['DOCUMENT_ROOT']."/home/templates/template.php";

class Footer implements template_header_footer {
    public static function render(){
        echo '
        <footer class="index-footer">
    <a href="'.HOME_PATH.'/index.php">
        <img src="https://www.kleague.com/assets/images/logo/foot_logo.png" alt="K리그 투명로고">
    </a>
</footer>

</body>
</html>
        ';
    }
}


?>

