<?php
echo "Test";

require_once("src/config.php");
echo "Test2";

require_once("src/log.php");
log::logAccess();
echo "Test3";

require_once("templates/templateFunctions.php");

require_once("templates/header.php");
require_once("templates/main.php");
require_once("templates/footer.php")
?>