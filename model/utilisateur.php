<?php
     class utilisateur{
        private  $id_ut=null;
        private  $role_ut=null;
        private  $username=null; 
        private  $nom_ut=null;
        private  $prenom_ut=null;
        private  $email_ut=null;
        private  $tel_ut=null;
        private  $cin_ut=null;
        private  $poid_ut=null;
        private  $taille_ut=null;
        private  $genre_ut=null;
        private  $age_ut=null;
        private  $addresse_ut=null;
        private  $login_ut=null;
        private  $mdp_ut=null;
       /* get id */ 
        public function getidut(){
            return $this->id_ut;
        }
        /*get and set non */
        public function setnomut($n){
            $this->nom_ut=$n;
        }
        public function getnomut(){
            return $this->nom_ut;
        }
        /*get and set prenon */
        public function setprenomut($p){
            $this->prenom_ut=$p;
        }
        public function getprenomut(){
            return $this->prenom_ut;
        }
        /*get and set email */
        public function setemailut($e){
            $this->email_ut=$e;
        }
        public function getemailut(){
            return $this->email_ut;
        }
        /*get and set tel */
        public function settelut($t){
            $this->tel_ut=$t;
        }
        public function gettelut(){
            return $this->tel_ut;
        }
        /*get and set username */
        public function setusername($un){
            $this->username=$un;
        }
        public function getusername(){
            return $this->username;
        }
        /*get and set role */
        public function setrole($ro){
            $this->role_ut=$ro;
        }
        public function getroleut(){
            return $this->role_ut;
        }
        /*get and set ciin */
        public function setcinut($cin){
            $this->cin_ut=$cin;
        }
        public function getcinut(){
            return $this->cin_ut;
        }
        /*get and set poid */
        public function setpoid($pd){
            $this->poid_ut=$pd;
        }
        public function getpoid(){
            return $this->poid_ut;
        }
        /*get and set taille */
        public function settaille($ta){
            $this->taille_ut=$ta;
        }
        public function gettaille(){
            return $this->taille_ut;
        }
        /*get and set username */
        public function setgenre($gen){
            $this->genre_ut=$gen;
        }
        public function getgenre(){
            return $this->genre_ut;
        }
        /*get and set age */
        public function setage($age){
            $this->age=$age;
        }
        public function getage(){
            return $this->age_ut;
        }
        /*get and set adresse */
        public function setadresseut($adu){
            $this->addresse_ut=$adu;
        }
        public function getadresseut(){
            return $this->addresse_ut;
        }
        /*get and set login */
        public function setlogin($log){
            $this->login_ut=$log;
        }
        public function getlogin(){
            return $this->login_ut;
        }
        /*get and set mdp */
        public function setmdput($mdp){
            $this->mdp_ut=$mdp;
        }
        public function getmdput(){
            return $this->mdp_ut;
        }
        public function __construct($id=null,$ro,$un,$n,$p,$e,$t,$cin,$pd,$ta,$gen,$age,$adu,$log,$mdp){
            $this->id_ut=$id;
            $this->role_ut=$ro;
            $this->username=$un;
            $this->nom_ut=$n;
            $this->prenom_ut=$p;
            $this->email_ut=$e;
            $this->tel_ut=$t;
            $this->cin_ut=$cin;
            $this->poid_ut=$pd;
            $this->taille_ut=$ta;
            $this->genre_ut=$gen;
            $this->age_ut=$age;
            $this->addresse_ut=$adu;
            $this->login_ut=$log;
            $this->mdp_ut=$mdp;
        }   
     }
?>