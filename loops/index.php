<!doctype html>
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
    <?php
    $level =1;
     for ($i=1;$i<=6;$i++){
         echo"<h$i>test<h$i>";
    }
    for ($i=6;$i>=1;$i--){
        echo"<h$i>test<h$i>";
    }
    $i=1;

    $a="100";
    $b="50";
   // echo"<p>".($a+$b)."</p>";
    $firstName="madDie";
    $lastName = "EFFa";
    //$fullName="$firstName $lastName";
   // $fullName = strtolower($firstName)." ". strtolower($lastName);
    $firstName= strtoupper($firstName[0]) . " " . strtolower($lastName);
    //echo $fullName;
    echo strtolower($firstName);
    //echo str_split ($fullName)
    echo $firstName[0];

    ?>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>

