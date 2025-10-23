<?php
//variables
$secPerMin = 60;
$secPerHour = 60* $secPerMin;
$secPerDay = 24* $secPerHour;
$secPerYear = 365* $secPerDay;
//current time
$now = time();
//end of semester time
$endOfSem = mktime(12, 0,0,12,20,2025);

$seconds = $endOfSem - $now;

$years = floor($seconds/$secPerYear);
$seconds = $seconds -($years * $secPerYear);

$days = floor($seconds/$secPerDay);
$seconds =$seconds -($days * $secPerDay);

$hours = floor($seconds/$secPerHour);
$seconds =$seconds -($hours * $secPerHour);

$minutes = floor($seconds/$secPerMin);
$seconds =$seconds -($minutes * $secPerMin);






?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maddie's Site</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
</head>
<body>
<header><?php include '../includes/header.php';?></header>
<nav>
    <?php include '../includes/nav.php';?>
</nav>
<main>
    <div >
    <h1>End Of Semester</h1>
    <h3>Years: <?=$years?> | Days:<?=$days?> | Hours:<?=$hours?> | Minutes:<?=$minutes?> | Seconds:<?=$seconds?></h3>
    </div>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>
