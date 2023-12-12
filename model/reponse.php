<?php

class reponse
{
    private ?int $idreponse = null;
    private ?string $date = null;
    private ?string $objet = null;
    private ?string $description = null;
    private ?int $idreclamation = null;

    public function __construct($id = null, $date, $obj, $desc, $idreclamation)
    {
        $this->idreponse = $id;
        $this->date = $date;
        $this->objet = $obj;
        $this->description = $desc;
        $this->idreclamation = $idreclamation;
    }

    public function getIdreponse()
    {
        return $this->idreponse;
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

    public function getReclamation()
    {
        return $this->idreclamation;
    }

    public function setReclamation($idreclam)
    {
        $this->idreclamation = $idreclam;
        return $this;
    }
}
