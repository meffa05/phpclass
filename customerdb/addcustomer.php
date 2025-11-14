<?php
$errorMessage="";
if(!empty($_POST["txtFirstName"]) && !empty($_POST["txtLastName"])){
    include "../includes/db.php";
    $con=getDBconnection();
    $txtFirstName = $_POST["txtFirstName"];
    $txtLastName= $_POST["txtLastName"];
    $txtAddress = $_POST["txtAddress"];
    $txtCity = $_POST["txtCity"];
    $txtState = $_POST["txtState"];
    $txtZip = $_POST["txtZip"];
    $txtPhone = $_POST["txtPhone"];
    $txtEmail = $_POST["txtEmail"];
    $txtPassword = $_POST["txtPassword"];
    $MemberKey=sprintf('%04X%04X%04X%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    try {
        $hashedPW=md5($txtPassword.$MemberKey);//variable for hashed password
        $query = "INSERT INTO customerdb ( FirstName, LastName, Address, City, State, Zip, Phone, Email, Password, MemberKey) VALUES (?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $txtFirstName, $txtLastName,$txtAddress, $txtCity, $txtState, $txtZip, $txtPhone, $txtEmail, $hashedPW, $MemberKey);
        mysqli_stmt_execute($stmt);

        header("Location: /customerdb");//will not work if and info has been sent back to the user
    }
    catch(mysqli_sql_exception $ex){
        //echo $ex;
        $errorMessage =$ex;
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
    <link rel="stylesheet" href="/cssstyle/customertable.css">
    <style>
        .grid-header{grid-area: grid-header;}
        .first-name{grid-area: first-name;}
        .fn-input{grid-area: fn-input;}
        .last-name{grid-area: last-name;}
        .ln-input{grid-area: ln-input;}
        .address{grid-area: address;}
        .address-input{grid-area: address-input;}
        .city{grid-area: city;}
        .city-input{grid-area: city-input;}
        .state{grid-area: state;}
        .state-input{grid-area: state-input;}
        .zip{grid-area: zip;}
        .zip-input{grid-area: zip-input;}
        .phone{grid-area: phone;}
        .phone-input{grid-area: phone-input;}
        .email{grid-area: email;}
        .email-input{grid-area: email-input;}
        .password{grid-area: password;}
        .password-input{grid-area: password-input;}
        .error-message{grid-area:error-message;}
        .grid-footer{grid-area: grid-footer;}
        .grid-container{
            display:grid;
            grid-template-areas:
           'grid-header  grid-header'
            'first-name fn-input'
            'last-name ln-input'
            'address address-input'
            'city city-input'
            'state state-input'
            'zip zip-input'
            'phone phone-input'
            'email email-input'
            'password password-input'
           'error-message error-message'
            'grid-footer grid-footer';
            border: 1px solid black;
            text-align: center;
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
    <form method="post">
        <div class="grid-container">
            <div class="grid-header">
                <h3>Add New Customer</h3>
            </div>

            <div class="first-name">
                <label for="txtFirstName">First Name</label>
            </div>
            <div class="fn-input">
                <input type="text" name="txtFirstName" id="txtFirstName" >
            </div>

            <div class="last-name">
                <label for="txtLastName">Last Name</label>
            </div>
            <div class="ln-input">
                <input type="text" name="txtLastName" id="txtLastName"  >
            </div>
            <div class="address">
                <label for="txtAddress">Address</label>
            </div>
            <div class="address-input">
                <input type="text" name="txtAddress" id="txtAddress"  >
            </div>
            <div class="city">
                <label for="txtCity">City</label>
            </div>
            <div class="city-input">
                <input type="text" name="txtCity" id="txtCity" >
            </div>
            <div class="state">
                <label for="txtState">State</label>
            </div>
            <div class="state-input">
                <input type="text" name="txtState" id="txtState"  >
            </div>
            <div class="zip">
                <label for="txtZip">Zip</label>
            </div>
            <div class="zip-input">
                <input type="text" name="txtZip" id="txtZip" >
            </div>
            <div class="phone">
                <label for="txtPhone">Phone</label>
            </div>
            <div class="phone-input">
                <input type="text" name="txtPhone" id="txtPhone"  >
            </div>
            <div class="email">
                <label for="txtEmail">Email</label>
            </div>
            <div class="email-input">
                <input type="text" name="txtEmail" id="txtEmail"  >
            </div>
            <div class="password">
                <label for="txtPassword">Password</label>
            </div>
            <div class="password-input">
                <input type="text" name="txtPassword" id="txtPassword" >
            </div>
            <div class="error-message <?PHP echo $errorMessage == "" ? "hidden" : ""?>">
                <p><?=$errorMessage;?></p>
            </div>
            <div class="grid-footer">
                <input type="submit" value="Add Customer">
            </div>
        </div>
    </form>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>
