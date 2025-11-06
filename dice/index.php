<?php
session_start();


function roll($dice_a){
    $randomIndex = mt_rand(0, count($dice_a) - 1);
    return $dice_a[$randomIndex];
}
$dice = [//array of dice images
    "image/dice_1.jpg",
    "image/dice_2.jpg",
    "image/dice_3.jpg",
    "image/dice_4.jpg",
    "image/dice_5.jpg",
    "image/dice_6.jpg",

];



        $UserRoll1 = roll($dice);
        $UserRoll2 = roll($dice);
        $ComputerRoll1 = roll($dice);
        $ComputerRoll2 = roll($dice);
        $ComputerRoll3 = roll($dice);


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
<h1>Dice Game</h1>
    <h2>Your Score:</h2>
    <img src="<?=$UserRoll1?>" alt="first dice">
    <img src="<?=$UserRoll2?>" alt="second dice">
    <h2>Computer Score</h2>
    <img src="<?=$ComputerRoll1?>" alt="first dice">
    <img src="<?=$ComputerRoll2?>" alt="second dice">
    <img src="<?=$ComputerRoll3?>" alt="third dice">
    <h2 id="winner">Winner:</h2>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>
