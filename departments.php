<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <title>Selection</title>
</head>
<body>
<a href="form.php" ></a>
<form action="departments.php" method="post">
    <label for="departments">Select Department</label>
    <select name="departments" id="departments">
<div>
    <label for="departments">SHOPPING DEPARTMENTS</label>
    <select name="departments">
        <?php
        //connecting to database
        $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200329020','gc200329020','zB*f8tPY');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // queery to get
        // set up, run the query, store the results
        $sql = "SELECT * FROM departments";
        $cmd = $conn->prepare($sql);
        $cmd -> execute();
        $games = $cmd -> fetchAll();
        //looping
        foreach($products as $product)
        {
            echo '<option>' . $product['Clothing,Shoes'] . '</option>';
            echo '<option>' . $product['Electronics'] . '</option>';
            echo '<option>' . $product['Movies,Music'] . '</option>';
            echo '<option>' . $product['Office,Stationary'] . '</option>';
            echo '<option>' . $product['Outdoor Living'] . '</option>';
        }

        // disconnect
        $conn = null;
        ?>
    </select>
</div>
        <button>Submit</button>
</form>
</body>
</html>