<?php
include "../model/produit.php";
include "../control/produitC.php";


$commandeController = new CommandeController();
$productController = new ProductController();

// Check if the delete form is submitted
if (isset($_POST['delete_product_id'])) {
    $deleteProductId = $_POST['delete_product_id'];

    // Perform product deletion
    try {
        $productController->deleteProduct($deleteProductId);
        echo 'Product deleted successfully!';
    } catch (Exception $e) {
        echo 'Error deleting product: ' . $e->getMessage();
    }
}

// Check if the add product form is submitted
if (isset($_POST['product_name']) && isset($_POST['price']) && isset($_POST['product_description'])) {
    if (!empty($_POST['product_name']) && !empty($_POST['price']) && !empty($_POST['product_description'])) {
        try {
            // Create a new product object
            $newProduct = new Product(null, $_POST['product_name'], $_POST['price'], $_POST['product_description'], $_POST['photo']);

            // Add the product using the controller
            $productController->addProduct($newProduct);
            echo 'Product added successfully!';
        } catch (Exception $e) {
            echo 'Error adding product: ' . $e->getMessage();
        }
    } else {
        echo 'All fields are required!';
    }
}
    if (isset($_POST['delete_commande_id'])) {
        $deleteCommandeId = $_POST['delete_commande_id'];

        try {
            $commandeController->deleteCommande($deleteCommandeId);
            echo 'Commande deleted successfully!';
        } catch (Exception $e) {
            echo 'Error deleting commande: ' . $e->getMessage();
        }}
 
    if (isset($_POST['update_commande'])) {
        $updateCommandeId = $_POST['update_commande_id'];
        $updateProductName = $_POST['update_product_name'];
    
        try {
            $commandeController->updateCommande($updateCommandeId, $updateProductName);
            echo 'Commande updated successfully!';
        } catch (Exception $e) {
            echo 'Error updating commande: ' . $e->getMessage();
        }
    }
    
?>
 <script>
    function validateAddProductForm() {
        var productName = document.getElementById('product_name').value;
        var productDescription = document.getElementById('product_description').value;
        var price = document.getElementById('price').value;

        // Check if any field is empty
        if (productName === '' || productDescription === '' || price === '') {
            alert('All fields are required for adding a product.');
            return false;
        }

        // Check if productName contains only letters
        if (!/^[a-zA-Z\s]+$/.test(productName)) {
            alert('Product name should contain only letters.');
            return false;
        }

        // Check if price is a non-negative number
        if (isNaN(price) || parseFloat(price) < 0) {
            alert('Price should be a non-negative number.');
            return false;
        }

        return true;
    }
    function validateUpdateCommandeForm() {
    var updateCommandeId = document.getElementById('update_commande_id').value;
    var updateProductname = document.getElementById('update_product_name').value;

    if (updateCommandeId === '' ||  update_product_name === '') {
        alert('All fields are required for updating a commande.');
        return false;
    }

    // You can add more validation as needed

    return true;
}

    function validateUpdateProductForm() {
        var updateProductId = document.getElementById('update_product_id').value;
        var updateProductName = document.getElementById('update_product_name').value;
        var updateProductDescription = document.getElementById('update_product_description').value;
        var updatePrice = document.getElementById('update_price').value;

        
        if (updateProductId === '' || updateProductName === '' || updateProductDescription === '' || updatePrice === '') {
            alert('All fields are required for updating a product.');
            return false;
        }

        
        if (!/^[a-zA-Z\s]+$/.test(updateProductName)) {
            alert('Updated product name should contain only letters.');
            return false;
        }

        
        if (isNaN(updatePrice) || parseFloat(updatePrice) < 0) {
            alert('Updated price should be a non-negative number.');
            return false;
        }

        return true;
    }

    function validateDeleteProductForm() {
        var deleteProductId = document.getElementById('delete_product_id').value;

        
        if (deleteProductId === '') {
            alert('Product ID is required for deleting a product.');
            return false;
        }

        return true;
    }

    function validateDeleteCommandeForm() {
        var deleteCommandeId = document.getElementById('delete_commande_id').value;

        if (deleteCommandeId === '') {
            alert('Commande ID is required for deleting a commande.');
            return false;
        }

        return true;
    }
</script>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="styless.css">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="staile.css">
</head>
<body>
<div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
    <div class="logo">
        <img src="aa.png" alt="Logo" height="96" width="126">
    </div>
    <div class="links">
        <a href="liste.php">admin gestion_client</a>
        <a href="admin.php">admin gestion_commande</a>
        <a href="admine.php">admin gestion_forum</a>
        <a href="reclamations.php">admin gestion_reclamation</a>
        <a href="update_delete_demandes.php">admin gestion_coaching</a>
        <a href="ajoutadmine.php">ajout admin</a>
    </div>
</div> <div class="content">
    <div style="margin-top: -52%;">
    <table class="product-table" style="margin:70px">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch products and display in the table
            $products = $productController->listProducts();
            foreach ($products as $product) {
                echo "<tr>";
                echo "<td>{$product['id_prod']}</td>"; // Update the key to 'id_prod'
                echo "<td>{$product['nom']}</td>"; // Update the key to 'nom'
                echo '<td><a href="../control/deleteprod.php?delete=' . $product['id_prod'] . '">Delete</a></td>';
                echo '<td><a href="updatee.php?update=' . $product['id_prod'] . '&name='.$product['nom'].'&descriptioon='.$product['description'].'&prix='.$product['prix_prod'].'">update</a></td>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    
    <div class="admin-container">
        <div class="add-product"style="margin-left:70px" >
            <h1>Add a New Product</h1>
            <form action="" method="post" onsubmit="return validateAddProductForm();">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" ><br><br>

                <label for="product_description">Product Description:</label>
                <textarea id="product_description" name="product_description" rows="4" ></textarea><br><br>

                <label for="price">Price ($):</label>
                <input type="number" id="price" name="price" step="0.01" ><br><br>

                <label for="photo">Product Image:</label>
                <input type="file" id="photo" name="photo" accept="image/*"><br><br>

                <input type="submit" value="Add Product">
            </form>
        </div>
       

        
        

        <div class="order-tracking"style="margin-left:70px">
            <h1>Order Tracking</h1>
            <div class="order-tracking-content">
                <ul id="order-list">
                <?php
            
            $commandeController = new CommandeController();

        
            $commandes = $commandeController->listCommandes();
          
            foreach ($commandes as $commande) {
                echo "<li>Command ID: " . $commande['id_commande'] . "</li>";
                echo "<li>User ID: " . ($commande['id_ut'] ?? 'N/A') . "</li>";
                echo "<li>Product ID: " . $commande['id_prod'] . "</li>";
                echo "<li>Product name: " . ($commande['nom'] ?? 'N/A') . "</li>";
                echo '<td><a href="../control/deletecom.php?delete=' . $commande['id_commande'] . '">Delete</a></td>';
                echo "<hr>"; 
            }
            ?>
                </ul>
            </div>
        </div>
    </div>

</div>
<div class="update-commande" style="margin-left:70px">   
    <h1>Update Commande</h1>
    <form action="" method="post" onsubmit="return validateUpdateCommandeForm();">
        <label for="update_commande_id">Commande ID to Update:</label>
        <input type="text" id="update_commande_id" name="update_commande_id"><br><br>

        <label for="update_product_name">New Product Name:</label>
        <input type="text" id="update_product_name" name="update_product_name"><br><br>

        <input type="submit" name="update_commande" value="Update Commande">
    </form>
</div>


</div>
</div>
    

<footer class="footer">
    <!-- Content for the footer goes here -->
</footer>

<script>
    function expandSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = '250px';
    }

    function collapseSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = '130px'; // Adjust this width as needed
    }

    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = sidebar.style.width === '250px' ? '50px' : '250px';
    }
</script>

    
</body>
</html>
