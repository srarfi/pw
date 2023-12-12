    <?php
    require "../config.php";
    session_start();    
    $id_u=$_SESSION["id"];

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
        public function updateProduct($productId, $productName, $price, $description, $photo)
        {
            $sql = "UPDATE produit SET nom = :product_name, prix_prod = :price, description = :description, photo = :photo WHERE id_prod = :product_id";
            $db = config::getConnexion();
        
            try {
                $query = $db->prepare($sql);
                $query->execute([
                    "product_id" => $productId,
                    "product_name" => $productName,
                    "price" => $price,
                    "description" => $description,
                    "photo" => $photo,
                ]);
            } catch (Exception $e) {
                throw new Exception("Error updating product: " . $e->getMessage());
            }
        }
 

  
        
     
     
     


        
        

        
    }




  










    class CommandeController
{
    public function listCommandes()
    {
        $sql = "SELECT * FROM commande,produit WHERE commande.id_prod=produit.id_prod ";
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
        $sql = "INSERT INTO commande VALUES (null, :id_prod,:id_ut)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                "id_ut" => $commande->getIdUt(),
                "id_prod" => $commande->getIdProd(),
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
class SalesController
{
    public function updateSalesCount($productId)
    {
        $sql = "UPDATE produit SET sales_count = sales_count + 1 WHERE id_prod = :productId";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute([
                "productId" => $productId,
            ]);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getBestAndLeastSellers()
    {
        $sql = "SELECT * FROM produit ORDER BY sales_count DESC LIMIT 1";
        $bestSeller = $this->executeQuery($sql);

        $sql = "SELECT * FROM produit ORDER BY sales_count ASC LIMIT 1";
        $leastSeller = $this->executeQuery($sql);

        return [
            'best_seller' => $bestSeller,
            'least_seller' => $leastSeller,
        ];
    }

    private function executeQuery($sql)
    {
        $db = config::getConnexion();

        try {
            $query = $db->query($sql);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
    ?>
