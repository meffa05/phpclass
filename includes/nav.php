<?php
$isHome = $_SERVER['REQUEST_URL'] =='/'  ? 'selected' : '';
$isloops = $_SERVER['REQUEST_URL'] =='/loops/'  ? 'selected' : '';
$iscountdown = $_SERVER['REQUEST_URL'] =='/countdown/' ? 'selected' : '';
$isMagic8Ball = $_SERVER['REQUEST_URL'] =='/Magic8Ball/' ? 'selected' : '';
$ismovielist = $_SERVER['REQUEST_URL'] =='/movielist/' ? 'selected' : '';
?>
<ul>
    <li><a href="/index.php">Home</a></li>
    <li><a href="/loops">Loops</a></li>
    <li><a href="/countdown">Countdown Timer</a></li>
    <li><a href="/Magic8Ball">Magic 8 Ball</a><?=$isMagic8Ball?></li>
    <li><a href="/movielist">Movie List</a><?=$ismovielist?></li>
</ul>
