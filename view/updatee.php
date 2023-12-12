<?php   
include "../model/produit.php";
include "../control/produitC.php";

$productController = new ProductController();

if (isset($_POST['update_product'])) {
        $updateProductId = $_POST['update_product_id'];
        $updateProductName = $_POST['update_product_name'];
        $updateProductDescription = $_POST['update_product_description'];
        $updatePrice = $_POST['update_price'];
        $updatePhoto = $_POST['update_photo'];
    
        // Perform product update
        try {
            $productController->updateProduct($updateProductId, $updateProductName, $updatePrice, $updateProductDescription, $updatePhoto);
            echo 'Product updated successfully!';
            header('Location: admin.php');
        } catch (Exception $e) {
            echo 'Error updating product: ' . $e->getMessage();
        }
    }  
?>
<html>
    <head>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" type="text/css" href="staile.css">
</head>
<body>
<div class="update-product">
<title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
        <form action="" method="post" onsubmit="return validateUpdateProductForm();">
            <label for="update_product_id">Product ID to Update:</label>
            <input type="text" id="update_product_id" name="update_product_id" value="<?php echo $_GET['update'] ?>" ><br><br>

            <label for="update_product_name">New Product Name:</label>
            <input type="text" id="update_product_name" name="update_product_name" value="<?php echo $_GET['name'] ?>"  ><br><br>

            <label for="update_product_description">New Product Description:</label>
            <textarea id="update_product_description" name="update_product_description" rows="4"  ><?php echo $_GET['descriptioon'] ?></textarea><br><br>

            <label for="update_price">New Price ($):</label>
            <input type="number" id="update_price" name="update_price" step="0.01" value="<?php echo $_GET['prix'] ?>" ><br><br>

            <label for="update_photo">New Product Image:</label>
            <input type="file" id="update_photo" name="update_photo" accept="image/*"><br><br>

            <input type="submit" name="update_product" value="Update Product">
        </form>
    </div>
</body>
</html>