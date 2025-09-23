<?php
$isHome = $_SERVER['REQUEST_URL'] =='/'  ? 'selected' : '';
$isLoops = $_SERVER['REQUEST_URL'] =='/'  ? 'selected' : '';
$isCountdown = $_SERVER['REQUEST_URL'] =='/' ? 'selected' : '';
$isMagic8Ball = $_SERVER['REQUEST_URL'] =='/' ? 'selected' : '';
?>
<ul>
    <li><a href="/index.php">Home</a></li>
    <li><a href="/loops">Loops</a></li>
    <li><a href="/countdown">Countdown Timer</a></li>
    <li><a href="#">Other</a></li>
    <li><a href="/Magic8Ball">Magic 8 Ball</a><?=$isMagic8Ball?></li>
</ul>
