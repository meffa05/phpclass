<?php
$isHome = $_SERVER['REQUEST_URL'] =='/'  ? 'selected' : '';
$isloops = $_SERVER['REQUEST_URL'] =='/loops/'  ? 'selected' : '';
$isMagic8Ball = $_SERVER['REQUEST_URL'] =='/Magic8Ball/' ? 'selected' : '';
$ismovielist = $_SERVER['REQUEST_URL'] =='/movielist/' ? 'selected' : '';
$isendofsemester = $_SERVER['REQUEST_URL'] =='/endofsemester/' ? 'selected' : '';
$iscustomerdb = $_SERVER['REQUEST_URL'] == '/customerdb/' ? 'selected' : '';
$isadminlogin = $_SERVER['REQUEST_URL'] == '/login/' ? 'selected' : '';
$ismemberlogin = $_SERVER['REQUEST_URL'] == '/login/' ? 'selected' : '';
$isdice = $_SERVER['REQUEST_URL'] == '/dice/' ? 'selected' : '';
?>
<ul>
    <li><a href="/index.php">Home</a></li>
    <li><a href="/loops">Loops</a><?=$isloops?></li>
    <li><a href="/Magic8Ball">Magic 8 Ball</a><?=$isMagic8Ball?></li>
    <li><a href="/movielist">Movie List</a><?=$ismovielist?></li>
    <li><a href="/endofsemester">End Of Semester Countdown</a><?=$isendofsemester?></li>
    <li><a href="/customerdb">Customer Database</a></li>
    <li><a href="/login">Admin Login</a><?=$isadminlogin?></li>
    <li><a href="/login">Member Login</a><?=$ismemberlogin?></li>
    <li><a href="/dice">Dice Assignment</a><?=$isdice?></li>
    <li><a href="/marathon/public" target="_blank">Marathon Website</a></li>

</ul>
