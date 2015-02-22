<?php
require_once('config.php');
require_once('api.php');
$api = new api(ACCESS_TOKEN);

$day = isset($_GET['day']) ? $_GET['day'] : null;

$storylineList = $api->getStoryline($day, true);
$storyline = $storylineList[0];

require_once('View/Storyline.php');