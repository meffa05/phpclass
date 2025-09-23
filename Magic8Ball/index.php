<?php
    session_start();
$responses = [
    "Ask again later",
    "Yes",
    "No",
    "It appears to be so",
    "Definitely",
    "Without a doubt",
    "Very doubtful",
    "Most likely",
    "Better not tell you now",
    "Concentrate and ask again",
    "Don't count on it",
    "Outlook not so good",
    "Signs point to yes",
    "Yes, definitely",
    "You may rely on it",
    "Reply hazy, try again",
    "Cannot predict now",
    "Outlook good",
    "As I see it, yes",
    "Don't bet on it"
];
$answer = "Ask me a question.";
$question = trim($_POST['question'] ?? '');
if($question != ''){
    if(substr($question, -1) != '?'){
        $answer = "Question must end with a question mark. Try Again.";
    }
    else if($question ==$_SESSION['question']){
    $answer = "Ask a different question";
    }
    else {


        $randomIndex = mt_rand(0, count($responses) - 1);
        $answer = $responses[$randomIndex];
        $_SESSION['question']= $question; //saves their question for later

    }
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
<h2>Magic 8 Ball</h2>
    <p class="answer"><?=$answer?></p>
    <form method="post"></form>
    <label for="question">Question:</label>
    <input type="text" name="question" id="question" value="<?=$question?>">
    <input type="submit" value="Ask the Magic 8 Ball">
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>
