<?php

include_once "constant.php";
include_once "validator.php";
include_once TEMPLATES_PATH."/header.php";
include_once TEMPLATES_PATH."/footer.php";
include_once TEMPLATES_PATH."/main-titles/index.php";

class Redirect{
    public static function redirection($location){
        exit('<script>
window.location.href = "'.$location.'";
</script>');
    }
    public static function redirectionWithAlert($message,$location){
        exit('<script>
alert("'.$message.'");
window.location.href = "'.$location.'";
</script>');
    }
}

?>