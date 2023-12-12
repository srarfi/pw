<?php
     class coaching{
        private  $id_coaching=null;
        private  $id_ut=null;
        private  $objectif=null; 
        private  $nb_h=null;
        private  $nb_j=null;
        private  $basket=null;
        
       /* get id */ 
        public function getidrepco(){
            return $this->id_ut;
        }
        /*get and set id_ut */
        public function setidut($id){
            $this->id_ut=$id;
        }
        public function getidut(){
            return $this->id_ut;
        }
        /*get and set objectif */
        public function setobj($o){
            $this->objectif=$o;
        }
        public function getobj(){
            return $this->objectif;
        }
        /*get and set nb_h */
        public function setnbh($nbh){
            $this->nb_h=$nbh;
        }
        public function getnbh(){
            return $this->nb_h;
        }
        /*get and set nb_j */
        public function setnbj($nbj){
            $this->nb_j=$nbj;
        }
        public function getnbj(){
            return $this->nb_j;
        }
        /*get and set basket */
        public function setbasket($basket){
            $this->basket=$basket;
        }
        public function getbasket(){
            return $this->basket;
        }                
        public function __construct($idd_rep_coaching=null,$idd_ut,$objectiff,$nb_hh,$nb_jj,$baskett){
            $this->id_coaching=$idd_rep_coaching;
            $this->id_ut=$idd_ut;
            $this->objectif=$objectiff;
            $this->nb_h=$nb_hh;
            $this->nb_j=$nb_jj;
            $this->basket=$baskett;
            
        }   
     }

     