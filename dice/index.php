<?php
session_start();

$dice = [//array of dice images
    "/image/dice_1.png",
    "/image/dice_2.png",
    "/image/dice_3.png",
    "/image/dice_4.png",
    "/image/dice_5.png",
    "/image/dice_6.png",

];

$countDice = count($dice);//count of total dice options
$neededRolls = 5;//number of images needed
$randomDice=[]; //array to store the results of the 5 rolls
    while (count($randomDice) < $neededRolls){
        $randomIndex= mt_rand(0, count($dice)-1);
        $randomDice[] = $dice[$randomIndex];//populate the array
    }

//variables to put into the image tags in the html
$pRoll1 = $randomDice[0];
$pRoll2 = $randomDice[1];
$cRoll1 = $randomDice[2];
$cRoll2 = $randomDice[3];
$cRoll3 = $randomDice[4];

//calculating the scores

//function to take the number out of the photo file name
function getValue($imagePath) {
    // $imagePath is defined here when the function is called!
    $fileName = basename($imagePath);
    return (int)str_replace(['dice_', '.png'], '', $fileName);//return the number from the file name
}

//take the players two rolls
$pValue1 = getValue($pRoll1);
$pValue2 = getValue($pRoll2);

// Add them together
$playerTotal = $pValue1 + $pValue2;


//take the computer score
$cValue1 = getValue($cRoll1);
$cValue2 = getValue($cRoll2);
$cValue3 = getValue($cRoll3);

//add them together
$ComputerTotal = $cValue3 + $cValue1 + $cValue2;

if($ComputerTotal > $playerTotal)
{
    $Winner = "Computer Wins!";
}
if($ComputerTotal < $playerTotal)
{
    $Winner = "Player Wins!";
}
if($ComputerTotal == $playerTotal)
{
    $Winner="Tie!";
}

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
    <h2>Your Score: <?=$playerTotal?></h2>
    <img src="<?=$pRoll1?>" alt="first dice">
    <img src="<?=$pRoll2?>" alt="second dice">
    <h2>Computer Score:<?=$ComputerTotal?></h2>
    <img src="<?=$cRoll1?>" alt="first dice">
    <img src="<?=$cRoll2?>" alt="second dice">
    <img src="<?=$cRoll3?>" alt="third dice">
    <h2 id="winner">Winner: <?=$Winner?></h2>
    <p></p>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>
