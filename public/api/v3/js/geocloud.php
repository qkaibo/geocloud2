<?php
header('Content-type: application/javascript');
include_once("../../../../app/conf/App.php");
new \app\conf\App();
if (!\app\conf\App::$param['host']) {
    include_once("../../../../app/conf/hosts.php");
}
echo "window.geocloud_host = \"" . \app\conf\App::$param['host'] . "\";\n";
echo "window.geocloud_maplib = \"" . ((isset($_GET["maplib"])) ? $_GET["maplib"] : "leaflet") . "\"\n";
echo "window.geocloud_locale = \"" . ((isset($_GET["locale"])) ? $_GET["locale"] : "en_US") . "\"\n";
if (isset($_GET["callback"])) {
    echo "window.geocloud_callback = \"" . $_GET["callback"] . "\";\n";
    require_once('async_loader.js');

} else {
    require_once('sync_loader.js');
}