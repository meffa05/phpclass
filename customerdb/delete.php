<?php
if(!empty($_GET["id"])) {
    include "../includes/db.php";
    $con = getDBconnection();
    $CustomerID = $_GET["id"];
    try {

        $query = "DELETE FROM customerdb where CustomerID =?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $CustomerID);
        mysqli_stmt_execute($stmt);
    } catch (mysqli_sql_exception $ex) {
        echo $ex;
    }
}
header("Location: /customerdb");
//no closing php tag needed