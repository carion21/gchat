<?php

//include "Model.php";

/**
 * classe Message
 */

class Message implements Model
{

    // définition des attributs

    private $idMessage;
    private $destinateur;
    private $destinataire;
    private $texte;
    private $idGroupe;
    private $dateRegister;

    public $table = "message";

    // définition des getters et setters pour les attributs

    function get_idMessage()
    {
        return $this->idMessage;
    }

    function set_idMessage($idr)
    {
        $this->idMessage = $idr;
    }

    function get_destinateur()
    {
        return $this->destinateur;
    }

    function set_destinateur($destinateur)
    {
        $this->destinateur = $destinateur;
    }

    function get_destinataire()
    {
        return $this->destinataire;
    }

    function set_destinataire($destinataire)
    {
        $this->destinataire = $destinataire;
    }

    function get_texte()
    {
        return $this->texte;
    }

    function set_texte($texte)
    {
        $this->texte = $texte;
    }

    function get_idGroupe()
    {
        return $this->idGroupe;
    }

    function set_idGroupe($idGroupe)
    {
        $this->idGroupe = $idGroupe;
    }

    function get_dateRegister()
    {
        return $this->dateRegister;
    }

    function set_dateRegister($dateRegister)
    {
        $this->dateRegister = $dateRegister;
    }

    public function ajouter()
    {

        include('../data/database.php');

        $content["idMessage"] = $this->idMessage;
        $content["destinateur"] = varchar($this->destinateur);
        $content["destinataire"] = varchar($this->destinataire);
        $content["texte"] = varchar($this->texte);
        $content["idGroupe"] = varchar($this->idGroupe);
        $content["dateRegister"] = varchar($this->dateRegister);

        $nb = nouveauMessage($database, $content);

        return $nb;
    }

    public function modifier($champModif, $valeurChampModif)
    {
        include('../data/database.php');
        
        $nb = modifierElementSelon(
            $database, $this->table,
            "idMessage", $this->idMessage,
            $champModif, $valeurChampModif
        );

        return $nb;
    }

    public function supprimer()
    {
        include('../data/database.php');

        $nb = supprimerElementSelon(
            $database, $this->table, 
            "idMessage", $this->idMessage
        );

        return $nb;
    }

    public function tousMessage()
    {
        include('../data/database.php');

        $messages = [];

        $elements = tousElement($database, $this->table);

        foreach ($elements as $element) {
            $message = new Message();

            $message->set_idMessage($element["idMessage"]);
            $message->set_destinateur($element["destinateur"]);
            $message->set_destinataire($element["destinataire"]);
            $message->set_texte($element["texte"]);
            $message->set_idGroupe($element["idGroupe"]);
            $message->set_dateRegister($element["dateRegister"]);

            array_push($messages, $message);

        }

        return $messages;
    }

    public function tousMessageSelon($champ, $valeurChamp)
    {
        include('../data/database.php');

        $messages = [];

        $elements = tousElementSelon($database, $this->table, $champ, $valeurChamp);

        foreach ($elements as $element) {
            $message = new Message();

            $message->set_idMessage($element["idMessage"]);
            $message->set_destinateur($element["destinateur"]);
            $message->set_destinataire($element["destinataire"]);
            $message->set_texte($element["texte"]);
            $message->set_idGroupe($element["idGroupe"]);
            $message->set_dateRegister($element["dateRegister"]);

            array_push($messages, $message);

        }

        return $messages;
    }
}
