<?php

class Reclamation
{
    private ?int $idReclam = null;
    private ?string $date = null;
    private ?string $objet = null;
    private ?string $description = null;

    public function __construct($id = null, $date, $obj, $desc)
    {
        $this->idReclam = $id;
        $this->date = $date;
        $this->objet = $obj;
        $this->description = $desc;
    }

    public function getIdReclam()
    {
        return $this->idReclam;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getObjet()
    {
        return $this->objet;
    }

    public function setObjet($objet)
    {
        $this->objet = $objet;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    } 
}
?>