<?php
    require "../config.php";
    class utilisateurc{
        public function list_utilisateur(){
            $sql="SELECT * FROM utilisateur";
            $db=config::getConnexion();
            try{
                $list=$db->query($sql);
                return $list;
            }
            catch(Exception $e){
                die("erreur".$e->getMessage());                
            }
        }

        public function deleteJoueur($id){
            $sql="DELETE FROM utilisateur WHERE id_ut= :id";
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

        public function addutilisateur($utilisateur){
            $sql="INSERT INTO utilisateur VALUES (null,:r,:un,:n,:p,:e,:t,:c,:po,:ta,:g,:a,:ad,0,:l,:m)";
            $db=config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute([
                "r"=>$utilisateur->getroleut(),
                "un"=>$utilisateur->getusername(),
                "n"=>$utilisateur->getnomut(),
                "p"=>$utilisateur->getprenomut(),
                "e"=>$utilisateur->getemailut(),
                "t"=>$utilisateur->gettelut(),
                "c"=>$utilisateur->getcinut(),
                "po"=>$utilisateur->getpoid(),
                "ta"=>$utilisateur->gettaille(),
                "g"=>$utilisateur->getgenre(),
                "a"=>$utilisateur->getage(),
                "ad"=>$utilisateur->getadresseut(),
                "l"=>$utilisateur->getlogin(),
                "m"=>$utilisateur->getmdput()]);
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }

        public function update_utilisateur($id, $username, $email, $tel, $add, $mdp) {
            $sql = "UPDATE utilisateur SET username=?, email_ut=?, tel_ut=?, addresse_ut=?, mdp_ut=? WHERE id_ut=?";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            
            try {
                $req->execute([$username, $email, $tel, $add, $mdp, $id]);
            } catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
        }
        

        public function verif_utilisateur($email){
            $sql = "UPDATE utilisateur SET verified=1 WHERE email_ut='".$email."'";
            $db=config::getConnexion();
            $req=$db->prepare($sql);
            try{
                $req->execute();
            }
            catch(Exception $e){
                die("Error".$e->getMessage());
            }
        }

}
?>