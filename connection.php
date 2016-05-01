<!DOCTYPE html>
<html>
<head>
    <title>Database Connection</title>
</head>
<body>
<?php

//connection to database
$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200329020', 'gc200329020', 'zB*f8tPY');

if (!$conn)  {
    die('Could not connect: ');
}
else {
    echo 'connected to the database';
}
$conn = null;
?>
</body>
</html>

