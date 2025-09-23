<?php
$firstname = $_POST['firstName'] ?? '';
$lastname = $_POST['lastName'] ?? '';
?>
<!Doctype html>
<html>
<head>
    <title>Testing Get and Post</title>
</head>
<body>
<h2> Welcome <?=$firstname?> <?=$lastname?></h2>
<form method="post" >
    <input type="text" name="firstName" id="firstName" value="<?=$firstname?>"/>
    <input type="text" name="lastName" id="lastName" value="<?=$lastname?>"/>
    <input  type="submit" value="Submit Data">
</form>
</body>
</html>
