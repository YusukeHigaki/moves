<?php
require_once('config.php');
require_once('api.php');
$api = new api(ACCESS_TOKEN);
$storylineList = $api->getStoryline(true);
$storyline = $storylineList[0];

require_once('View/Storyline.php');