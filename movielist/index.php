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
        table{
            border: 1px solid black;
            width: 80%;
            margin: 10px auto;
            table-layout: fixed;

        }
        th,td{
            border: 1px solid black;
            padding:.2rem;
            text-align: center;

        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>
<header><?php include '../includes/header.php';?></header>
<nav>
    <?php include '../includes/nav.php';?>
</nav>
<main>
<h2>My Movie List</h2>
    <table id="movies">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Rating</th>
        </tr>

<?php
include"../includes/db.php";
$con = getDBconnection();
$result =mysqli_query($con, "SELECT * FROM movielist");

while($row = mysqli_fetch_array($result)){

    $movieID = $row["MovieID"];
    $movieTitle = $row["MovieTitle"];
    $movieRating = $row["MovieRating"];
    echo "<tr>";
    echo "       <td>$movieID</td>";
    echo "        <td>$movieTitle</td>";
   echo "         <td>$movieRating</td>";
   echo " </tr>";
}
?>
    </table>
    <a href="addmovie.php">Add a new movie</a>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html>