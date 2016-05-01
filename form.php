

<?php ob_start();
try {
    $page_product = null;
    $page_product = ('Products');
    require_once('header.php');
//check if we have an product ID in the querystring
    if (!empty($_GET['page_product']) && (is_numeric($_GET['page_product']))) {
//if we do, store in a variable
        $product_id = $_GET['page_product'];
//connect
        $conn = new PDO('mysql:host=sql.computerstudi.es;dbname=gc200329020', 'gc200329020', 'zB*f8tPY');
//select all the data for the selected product
        $sql = "SELECT * FROM product WHERE page_product = :page_product";

        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':page_product', $page_product, PDO::PARAM_INT);
        $cmd->execute();
        $products = $cmd->fetchAll();
        //store each value from the database into a variable
        foreach ($products as $product) {
            $productName = $product['productName'];
            $productQuantity = $product['productQuantity'];
            $manufactureDate = $product['manufactureDate'];
            $expiryDate = $product['expiryDate'];
        }

//disconnect
        $conn = null;
    }
}
catch(Exception $e){
        header('location:error.php');
        mail('jahnaveeparmar@gmail.com','product error',$e);

    }
ob_end_flush();
?>
    <h1>LET'S BUY !</h1>
    <a href="product-name.php"title="Product List">List Of Products></a>
    <form action="save-product.php" method="post">
        <fieldset>
            <label for="productName"class="col-sm-3">PRODUCT NAME</label>
            <input name="productName" id="productName" placeholder="Product Name"/>
        </fieldset>

        <fieldset>
            <label for="productQuantity"class="col-sm-3">PRODUCT QUANTITY</label>
            <input name="productQuantity" id="productName" placeholder="productQuantity"/>
        </fieldset>
        <fieldset>

            <label for="manufactureDate" class="col-sm-3">MANUFACTURE DATE</label>
            <input name="manufactureDate" id="manufactureDate" placeholder="Manufacturing Date" required  />
        </fieldset>

        <fieldset>
            <label for="expiryDate" class="col-sm-3">EXPIRY DATE</label>
            <input name="expiryDate" id="expiryDate" placeholder="Expiry Date" required  />
        </fieldset>

        <fieldset>
            <label for="departments" class="col-sm-3">Departments</label>
            <select name="departments" id="departments">
                <option value="Clothing,Shoes">Clothing,Shoes</option>
                <option value="Electronics">Electronics</option>
                <option value="Movies,Music">Movies,Music</option>
                <option value="Office,Stationary">Office,Stationary</option>
                <option value="Outdoor Living">Outdoor Living</option>
            </select>
        </fieldset>
        <button class = "btn btn-primary col-sm-offset-3">Save</button>
    </form>
<?php require_once('footer.php'); ?>