    <?php

    require "../config.php";

    class ProductController
    {
        public function listProducts()
        {
            $sql = "SELECT * FROM produit";
            $db = config::getConnexion();
            try {
                $list = $db->query($sql);
                return $list;
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        }

        public function deleteProduct($id)
        {
            $sql = "DELETE FROM produit WHERE id_prod = :id";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            try {
                $req->execute();
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        }

        public function addProduct($product)
        {
            $sql = "INSERT INTO produit (nom, prix_prod, description, photo) VALUES (:name, :price, :description, :photo)";
            $db = config::getConnexion();
            
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    "name" => $product->getProductName(),
                    "price" => $product->getPrice(),
                    "description" => $product->getDescription(),
                    "photo" => $product->getPhoto(),
                ]);
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        }
 

  
        
     
     
     


        
        

        
    }
    class CommandeController
{
    public function listCommandes()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function deleteCommande($id)
    {
        $sql = "DELETE FROM commande WHERE id_commande = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function addCommande($commande)
    {
        $sql = "INSERT INTO commande VALUES (null, :id_ut, :id_prod, :product_nom)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                "id_ut" => $commande->getIdUt(),
                "id_prod" => $commande->getIdProd(),
                "product_nom" => $commande->getProductNom(), // Assuming you have a getter for product_nom
            ]);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
    public function updateCommande($commandeId, $productName)
    {
        $sql = "UPDATE commande SET product_nom = :product_name WHERE id_commande = :id";
        $db = config::getConnexion();
    
        try {
            $query = $db->prepare($sql);
            $query->execute([
                "id" => $commandeId,
                "product_name" => $productName,
            ]);
        } catch (Exception $e) {
            throw new Exception("Error updating commande: " . $e->getMessage());
        }
    }
    
    
}
    ?>
