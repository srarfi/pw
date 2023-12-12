<?php
    require "../config.php";
    class coachingc{
        public function plans($coaching){
            $sql="INSERT INTO coaching(id_ut,objectif,nb_h,nb_j,basket) VALUES (:i,:o,:h,:j,:b)";
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute([
                "i"=>$coaching->getidut(),
                "o"=>$coaching->getobj(),
                "h"=>$coaching->getnbh(),
                "j"=>$coaching->getnbj(),
                "b"=>$coaching->getbasket(),
            ]);
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }

        public function update($id_co, $objectif, $nb_jours, $nb_heures, $ex_basket, $rep) {
            $sql = "UPDATE coaching SET objectif='$objectif', nb_j='$nb_jours', nb_h='$nb_heures', basket='$ex_basket', reponse='$rep' WHERE id_coaching=$id_co";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();
            } catch (Exception $e) {
                die("Error" . $e->getMessage());
            }
        }
        


        public function list_coaching(){
            $sql="SELECT * FROM coaching";
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }

        public function deletecoaching($id){
            $sql="DELETE FROM coaching WHERE id_ut= :id";
            $db=config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':id',$id);
            try{
                $req->execute();
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }



    }

   