<?php ob_start();
$page_product = null;
$page_product = 'Product Listing';
require_once('header.php');
?>

<h1>product Name</h1>



<?php
try {
$page_product = null;
$page_product = 'List of Products';

//connect
    $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200329020', 'gc200329020', 'zB*f8tPY');
//SQL DEBUGGING
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Sql queery for data
    $sql = "SELECT * FROM product";
//execute and dtore the results
    $cmd = $conn->prepare($sql);
    $cmd->execute();
    $products = $cmd->fetchAll();
//adding headings to the table
    echo '<table class="table table-striped"<thead><th> PRODUCT NAME </th><th> QUANTITY OF PRODUCT </th><th> MANUFACURING DATE </th>
<th> EXPIRY DATE </th></thead><tbody>';
//looping
    foreach ($products as $product) {

        echo '<tr><td>' . $product['productName'] . '</td>
    <td>' . $product['productQuantity'] . '</td>
    <td>' . $product['manufactureDate'] . '</td>
    <td>' . $product['expiryDate'] . '</td></tr>';
//closing table
    }

    echo '</tbody></table>';
    $conn = null;
}
catch(Exception $e){
    header('location:error.php');
 mail('jahnaveeparmar@gmail.com','product error',$e);

}
require_once('footer.php');
ob_end_flush();
?>

