<?php ob_start();
$page_product = null;
$page_product = 'Product Listing';
require_once('header.php');
?>

<?php ob_start();
try{
//form inputs storing in variables
$productName = $_POST['productName'];
$productQuantity = $_POST['productQuantity'];
$manufactureDate = $_POST['manufactureDate'];
$expiryDate = $_POST['expiryDate'];

$page_product=$_POST['$page_product'];

//creating flag to complete status of the form
$ok = true;

//do our from validation before saving
if (empty($productName))
{
    echo'Name required <br />';

}

if (empty($productQuantity)|| !is_numeric($productQuantity))
{
    echo'Quantity of product is required and it must be in number <br />';

}

if (empty($manufactureDate)|| !is_numeric($manufactureDate))
{
    echo'Manufacture Date required and must be in number <br />';

}

if (empty($expiryDate)|| !is_numeric($expiryDate)){
    echo'Expiry Date is required and must be number <br />';

}

//save only if the form is complete
if($ok == true) {}
//to save product , set of sql comment is required
$sql = "INSERT INTO product (productName,productQuantity,manufactureDate,expiryDate) VALUES(:productName, :productQuantity, :manufactureDate, :expiryDate) ";

//connection to database

$conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200329020', 'gc200329020', 'zB*f8tPY');

if(!empty($page_product))
{
    $sql = "UPDATE product SET productName = :productName, productQuantity= :productQuantity, manufactureDate = :manufactureDate, expiryDate = :expiryDate WHERE page_product = :page_product";
}
//Set-up an SQL command to save the new game
else {
    $sql = "INSERT INTO product (productName, productQuantity, manufactureDate,expiryDate) VALUES (:productName, :productQuantity, :manufactureDate, :expiryDate)";
}
//Set-up a command object
$cmd = $conn->prepare($sql);

//inputs variables with placeholders
    $cmd->bindParam(':productName', $productName, PDO::PARAM_STR, 20);
    $cmd->bindParam(':productQuantity', $productQuantity, PDO::PARAM_INT);
    $cmd->bindParam(':manufactureDate', $manufactureDate, PDO::PARAM_INT);
    $cmd->bindParam(':expiryDate', $expiryDate, PDO::PARAM_INT);

if (!empty($page_product))
{ $cmd ->bindParam(':page_product',$page_product ,PDO::PARAM_INT);}
//execute
    $cmd->execute();

//print the message
    echo 'product saved in your cart';

//disconnect
    $conn = null;
}
catch(Exception $e){
    header('location:error.php');
    mail('jahnaveeparmar@gmail.com','product error',$e);

}
ob_end_flush();
?>
</body>
</html>


