<?php

include_once "../../common/common.php";

session_start();
// Destroy session id and session variables
session_destroy();

exit('<script>
alert("Logout complete!");
</script>
<meta http-equiv="refresh" content="0;'.HOME_PATH.'">');
?>