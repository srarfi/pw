<?php
class Commande
{
    private $id_commande;
    private $id_ut;
    private $id_prod;

    public function getIdCommande()
    {
        return $this->id_commande;
    }

 

    public function getIdUt()
    {
        return $this->id_ut;
    }



    public function getIdProd()
    {
        return $this->id_prod;
    }
  



 
    public function __construct($idCommande, $idUt, $idProd, )
    {
        $this->id_commande = $idCommande;
        $this->id_ut = $idUt;
        $this->id_prod = $idProd;
        
    }
}
?>