<?php
//do not have any spaces
if(empty($_GET["id"]))
{
    header("Location: /customerdb");
}

include "../includes/db.php";
$con=getDBconnection();
$CustomerID=$_GET["id"];

try {


    $query = "SELECT * from customerdb where CustomerID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $CustomerID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    $FirstName = $row["FirstName"];
    $LastName =$row["LastName"];
    $Address = $row["Address"];
    $City = $row["City"];
    $State = $row["State"];
    $Zip = $row["Zip"];
    $Phone = $row["Phone"];
    $Email = $row["Email"];
    $Password = $row["Password"];
}
catch(mysqli_sql_exception $ex){
    echo $ex;
}

//do the update (update the db)
if(!empty($_POST["txtFirstName"]) && !empty($_POST["txtLastName"])){
    $txtFirstName = $_POST["txtFirstName"];
    $txtLastName= $_POST["txtLastName"];
    $txtAddress = $_POST["txtAddress"];
    $txtCity = $_POST["txtCity"];
    $txtState = $_POST["txtState"];
    $txtZip = $_POST["txtZip"];
    $txtPhone = $_POST["txtPhone"];
    $txtEmail = $_POST["txtEmail"];
    $txtPassword = $_POST["txtPassword"];

    try {

        $query = "UPDATE customerdb SET FirstName = ?, LastName = ?, Address = ?, City = ?, State = ?, Zip = ?, Phone = ?, Email = ?, Password = ? where CustomerID = ?;";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $txtFirstName, $txtLastName, $txtAddress, $txtCity, $txtState, $txtZip, $txtPhone, $txtEmail, $txtPassword, $CustomerID);
        mysqli_stmt_execute($stmt);

        header("Location: /customerdb");//will not work if and info has been sent back to the user
    }
    catch(mysqli_sql_exception $ex){
        echo $ex;
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
                <h3>Update Customer</h3>
            </div>

            <div class="first-name">
                <label for="txtFirstName">First Name</label>
            </div>
            <div class="fn-input">
                <input type="text" name="txtFirstName" id="txtFirstName" value="<?=$FirstName;?>">
            </div>

            <div class="last-name">
                <label for="txtLastName">Last Name</label>
            </div>
            <div class="ln-input">
                <input type="text" name="txtLastName" id="txtLastName" value="<?=$LastName;?>" >
            </div>
            <div class="address">
                <label for="txtAddress">Address</label>
            </div>
            <div class="address-input">
                <input type="text" name="txtAddress" id="txtAddress" value="<?=$Address;?>" >
            </div>
            <div class="city">
                <label for="txtCity">City</label>
            </div>
            <div class="city-input">
                <input type="text" name="txtCity" id="txtCity" value="<?=$City;?>" >
            </div>
            <div class="state">
                <label for="txtState">State</label>
            </div>
            <div class="state-input">
                <input type="text" name="txtState" id="txtState" value="<?=$State;?>" >
            </div>
            <div class="zip">
                <label for="txtZip">Zip</label>
            </div>
            <div class="zip-input">
                <input type="text" name="txtZip" id="txtZip" value="<?=$Zip;?>" >
            </div>
            <div class="phone">
                <label for="txtPhone">Phone</label>
            </div>
            <div class="phone-input">
                <input type="text" name="txtPhone" id="txtPhone" value="<?=$Phone;?>" >
            </div>
            <div class="email">
                <label for="txtEmail">Email</label>
            </div>
            <div class="email-input">
                <input type="text" name="txtEmail" id="txtEmail" value="<?=$Email;?>" >
            </div>
            <div class="password">
                <label for="txtPassword">Password</label>
            </div>
            <div class="password-input">
                <input type="text" name="txtPassword" id="txtPassword" value="<?=$Password;?>" >
            </div>

            <div class="grid-footer">
                <input type="submit" value="Update Customer">
                <input type="button" value="Delete Customer" id="delete">
            </div>
        </div>
    </form>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
<script>
    //Java
    const deleteButton = document.querySelector('#delete')
    deleteButton.addEventListener('click',() => {
        window.location = './delete.php?id=<?=$CustomerID?>'
    })
</script>
</body>
</html><?php
