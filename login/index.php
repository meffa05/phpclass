<?php
    session_start();

    $errorMessage="";
    if(!empty($_POST["txtUsername"])) {
        if (!empty($_POST["txtPassword"])) {


            $Username = $_POST["txtUsername"];
            $Password = $_POST["txtPassword"];
            if($Username =="admin" && $Password=="p@ss"){
                $_SESSION["UID"]=1;
                header("Location:admin.php");

            }
            else{
                if($Username =="member" && $Password=="p@ss"){
                    header("Location:member.php");
                }

                $msg="Sorry, Wrong Password or Username";
            }

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
    <link rel="stylesheet" href="/cssstyle/grid.css">
    <style>
        .grid-header{grid-area: grid-header;}
        .username{grid-area: username;}
        .username-input{grid-area: username-input;}
        .password{grid-area: password;}
        .password-input{grid-area: password-input;}
        .grid-footer{grid-area: grid-footer;}
        .grid-container{
            display:grid;
            grid-template-areas:
            'grid-header  grid-header'
            'username username-input'
            'password password-input'
            'grid-footer grid-footer';
            border: 1px solid black;
            text-align: center;
            width:60%;
            margin-right: auto;
            margin-left:auto;
        }
        .grid-container >div{border: 1px solid black; text-align: center}
        .grid-container input[type ="text"]{width:98%; margin:  2px 0;}

    </style>
</head>
<body>
<header><?php include '../includes/header.php';?></header>
<nav>
    <?php include '../includes/nav.php';?>
</nav>
<main>
    <h3 id="error"><?=$msg?></h3>
    <form method="post">
        <div class="grid-container">
            <div class="grid-header">
                <h3>Login</h3>
            </div>

            <div class="username">
                <label for="txtUsername">Username</label>
            </div>
            <div class="username-input">
                <input type="text" name="txtUsername" id="txtUsername">
            </div>

            <div class="password">
                <label for="txtPassword">Password</label>
            </div>
            <div class="password-input">
                <input type="password" name="txtPassword" id="txtPassword">
            </div>

            <div class="grid-footer">
                <input type="submit" value="Login">
            </div>
        </div>
    </form>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>