<?php
//do not have any spaces
if(empty($_GET["id"]))
{
    header("Location: /movielist");
}
include "../includes/db.php";
$con=getDBconnection();
$movieID=$_GET["id"];
try {

    $query = "SELECT * from movielist where MovieID =?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $movieID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    $movieTitle = $row["MovieTitle"];
    $movieRating =$row["MovieRating"];
}
catch(mysqli_sql_exception $ex){
    echo $ex;
}
//do the update (update the db)
if(!empty($_POST["txtTitle"]) && !empty($_POST["txtRating"])){
    $txtTitle = $_POST["txtTitle"];
    $txtRating= $_POST["txtRating"];
    try {

        $query = "UPDATE movielist SET MovieTitle = ?, MovieRating = ? where MovieID = ?;";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sss", $txtTitle, $txtRating, $movieID);
        mysqli_stmt_execute($stmt);

        header("Location: /movielist");//will not work if and info has been sent back to the user
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
        .movie-title{grid-area: movie-title;}
        .title-input{grid-area: title-input;}
        .movie-rating{grid-area: movie-rating;}
        .rating-input{grid-area: rating-input;}
        .grid-footer{grid-area: grid-footer;}
        .grid-container{
            display:grid;
            grid-template-areas:
'grid-header  grid-header'
            'movie-title title-input'
            'movie-rating rating-input'
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
                <h3>Update Movie</h3>
            </div>

            <div class="movie-title">
                <label for="txtTitle">Movie Title</label>
            </div>
            <div class="title-input">
                <input type="text" name="txtTitle" id="txtTitle" value="<?=$movieTitle;?>">
            </div>

            <div class="movie-rating">
                <label for="txtRating">Rating</label>
            </div>
            <div class="rating-input">
                <input type="text" name="txtRating" id="txtRating" value="<?=$movieRating;?>" >
            </div>

            <div class="grid-footer">
                <input type="submit" value="Update Movie">
                <input type="button" value="Delete Movie" id="delete">
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
        window.location = './delete.php?id=<?=$movieID?>'
    })
</script>
</body>
</html>
