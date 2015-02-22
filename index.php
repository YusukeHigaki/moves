<?php
require_once('config.php');
require_once('api.php');
$api = new api(ACCESS_TOKEN);
$result = $api->getActivities();
echo("<pre>");var_dump($result);echo("<pre>");