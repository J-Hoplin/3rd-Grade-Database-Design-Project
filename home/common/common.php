<?php

include_once "constant.php";
include_once "validator.php";
include_once TEMPLATES_PATH."/header.php";
include_once TEMPLATES_PATH."/footer.php";
include_once TEMPLATES_PATH."/main-titles/index.php";
include_once TEMPLATES_PATH."/search/index.php";

class Redirect{
    /**
     * @param $location
     * @return void
     *
     * Normal redirection
     * - without alert message
     * - just redirect to location
     */
    public static function redirection($location){
        exit('<script>
window.location.href = "'.$location.'";
</script>');
    }

    /**
     * @param $message
     * @param $location
     * @return void
     *
     * Noraml redirection
     * - with alert message
     * - redirect to location
     *
     */
    public static function redirectionWithAlert($message,$location){
        exit('<script>
alert("'.$message.'");
window.location.href = "'.$location.'";
</script>');
    }

    /**
     * @param $message
     * @return void
     *
     * Home redirection
     */
    public static function redirectHome($message = ""){
        $message = $message ? $message : "Something crushed while processing";
        exit('<script>
alert("'.$message.'");
window.location.href = "'.HOME_PATH.'";
</script>');
    }
}

?>