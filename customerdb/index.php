<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maddie's Site</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <link rel="stylesheet" href="/cssstyle/customertable.css">
</head>
<body>
<header><?php include '../includes/header.php';?></header>
<nav>
    <?php include '../includes/nav.php';?>
</nav>
<main>
    <h2>Customer Listing</h2>
    <table class="customers">
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Password</th>
        </tr>

        <?php
        include"../includes/db.php";
        $con = getDBconnection();
        $result =mysqli_query($con, "SELECT * FROM customerdb");

        while($row = mysqli_fetch_array($result)){

            $CustomerID = $row["CustomerID"];
            $FirstName = $row["FirstName"];
            $LastName = $row["LastName"];
            $Address = $row["Address"];
            $City = $row["City"];
            $State = $row["State"];
            $Zip = $row["Zip"];
            $Phone = $row["Phone"];
            $Email = $row["Email"];
            $Password = $row["Password"];

            echo "<tr>";
            echo "   <td>$CustomerID</td>";
            echo "   <td>";
            echo "        <a href=\"customer.php?id=$CustomerID\">$FirstName</a>";
            echo "</td>";
            echo " <td>$LastName</td>";
            echo  "<td>$Address</td>";
            echo  "<td>$City</td>";
            echo  "<td>$State</td>";
            echo  "<td>$Zip</td>";
            echo  "<td>$Phone</td>";
            echo  "<td>$Email</td>";
            echo  "<td>$Password</td>";

            echo " </tr>";
        }
        ?>
    </table>
    <a href="addcustomer.php">Add a New Customer</a>
</main>
<footer>
    <?php include '../includes/footer.php';?>
</footer>
</body>
</html><?php
