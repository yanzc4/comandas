<?php
$cabecera = "Reportes";
require_once '../frontend/cabecera.php';
$user_agent = $_SERVER["HTTP_USER_AGENT"];
if (preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $user_agent)) {
    require_once "../frontend/header.php";
}
?>



<?php
require_once '../frontend/footer.php';
?>