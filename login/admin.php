<?php
session_start();
$error="";
if(!isset($_SESSION["UID"])){//making sure the user is logged in, if not it redirects to the index page
    header("Location:index.php");
}
if(isset($_POST["btnSubmit"])){//if html form was submit using the post method
    if(!empty($_POST["txtUsername"])){//if the username is not empty

        $Username=$_POST["txtUsername"];//set username equal to the value of the txtUsername
    }
    else{
        $err="Required Username";//else throw the error
    }
    if(!empty($_POST["txtPassword"])){

            $Password = $_POST["txtPassword"];
    }
    else{
        $error="Required Password";
    }
    if(!empty($_POST["txtPassword2"])){
        $Password2=$_POST["txtPassword2"];
    }
    else{
        $error="";
    }
    if($Password != $Password2){

            $error="Password does not match";

    }
    if(!empty($_POST["txtRole"])){
        $Role=$_POST["txtRole"];
    }
    else{
        $error="Required Role";
    }
    if(!empty($_POST["txtEmail"])){
        $Email=$_POST["txtEmail"];
    }
    else{
        $error="Required Email";
    }
    if($error==""){
        $memberKey="XXXXXXXX";

            include "../includes/db.php";
        $con=getDBconnection();
            $query = "INSERT INTO memberLogin (memberName, memberPassword, roleID, memberEmail, memberKey) VALUES (?,?,?,?,?);";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $Username, $Password, $Role, $Email, $memberKey);
            mysqli_stmt_execute($stmt);



        $Username= "";
        $Password="";
        $Password2="";
        $Role="";
        $Email="";
        $error="Member Added Database";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maddie's Site</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <style>
        .grid-header{grid-area: grid-header;}
        .username{grid-area: username;}
        .username-input{grid-area: username-input;}
        .password{grid-area: password;}
        .password-input{grid-area: password-input;}
        .password2{grid-area: password2;}
        .password2-input{grid-area: password2-input;}
        .role{grid-area: role;}
        .role-input{grid-area: role-input;}
        .email{grid-area: email;}
        .email-input{grid-area: email-input;}
        .grid-footer{grid-area: grid-footer;}
        .grid-container{
            display:grid;
            grid-template-areas:
            'grid-header  grid-header'
            'username username-input'
            'password password-input'
            'password2 password2-input'
            'role role-input'
            'email email-input'
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
<h3>Admin Page</h3>
<h3><?=$error?></h3>
    <form method="post">
        <div class="grid-container">
            <div class="grid-header">
                <h3>Add New Member</h3>
            </div>

            <div class="username">
                <label for="txtUsername">Username</label>
            </div>
            <div class="username-input">
                <input type="text" name="txtUsername" id="txtUsername" value="<?=$Username?>">
            </div>

            <div class="password">
                <label for="txtPassword">Password</label>
            </div>
            <div class="password-input">
                <input type="password" name="txtPassword" id="txtPassword" value="<?=$Password?>">
            </div>
            <div class="password2">
                <label for="txtPassword2">Retype Password</label>
            </div>
            <div class="password2-input">
                <input type="password" name="txtPassword2" id="txtPassword2" value="<?=$Password2?>">
            </div>
            <div class="role">
                <label for="txtRole">Role</label>
            </div>
            <div class="role-input">
                <select name="txtRole" id="txtRole" value="<?=$Role?>">
                    <?php
                    include"../includes/db.php";
                    $con = getDBconnection();
                    $result =mysqli_query($con, "SELECT * FROM role");

                    while($row = mysqli_fetch_array($result)){


                        $roleValue = $row["roleValue"];

                        //echo "<tr>";
                        //echo "   <td>$roleValue</td>";
                       // echo " </tr>";
                    }
                    ?>
                </select>
            </div>
            <div class="email">
                <label for="txtEmail">Email</label>
            </div>
            <div class="email-input">
                <input type="text" name="txtEmail" id="txtEmail" value="<?=$Email?>">
            </div>

            <div class="grid-footer">
                <input type="submit" value="Create User" name="btnSubmit">
            </div>
        </div>
    </form>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>
