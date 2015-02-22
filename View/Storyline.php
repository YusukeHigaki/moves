<!DOCTYPE html>
<html>
<head>
<title>Moves Story Line</title>
</head>
<body>
<?php
$sum = 0;
foreach ($storyline->segments as $segment) {
    if ($segment->type !== 'move') continue;
    foreach ($segment->activities as $activity) {
        if ($activity->activity !== 'transport') continue;
        $start = date("Y/m/d H:i",strtotime($activity->startTime));
        $end = date("Y/m/d H:i",strtotime($activity->endTime));
        echo "<h2>{$start}〜{$end}</h2>";
        foreach ($activity->trackPoints as $trackPoint){
            echo  "{$trackPoint->lat},{$trackPoint->lon}<br>";
        }
    }
}
?>
</body>
</html>
