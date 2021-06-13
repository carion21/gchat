<?php

//include "Model.php";

/**
 * classe User
 */

class User implements Model
{

    // définition des attributs

    private $idUser;
    private $pseudo;
    private $motdepasse;
    private $genre;

    public $table = "user";

    // définition des getters et setters pour les attributs

    function get_idUser()
    {
        return $this->idUser;
    }

    function set_idUser($idr)
    {
        $this->idUser = $idr;
    }

    function get_pseudo()
    {
        return $this->pseudo;
    }

    function set_pseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    function get_motdepasse()
    {
        return $this->motdepasse;
    }

    function set_motdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
    }

    function get_genre()
    {
        return $this->genre;
    }

    function set_genre($genre)
    {
        $this->genre = $genre;
    }

    public function ajouter()
    {

        include('../data/database.php');

        $content["idUser"] = $this->idUser;
        $content["pseudo"] = varchar($this->pseudo);
        $content["motdepasse"] = varchar($this->motdepasse);
        $content["genre"] = varchar($this->genre);

        $nb = nouveauUser($database, $content);

        return $nb;
    }

    public function modifier($champModif, $valeurChampModif)
    {
        include('../data/database.php');
        
        $nb = modifierElementSelon(
            $database, $this->table,
            "idUser", $this->idUser,
            $champModif, $valeurChampModif
        );

        return $nb;
    }

    public function supprimer()
    {
        include('../data/database.php');

        $nb = supprimerElementSelon(
            $database, $this->table, 
            "idUser", $this->idUser
        );

        return $nb;
    }

    public function tousUser()
    {
        include('../data/database.php');

        $users = [];

        $elements = tousElement($database, $this->table);

        foreach ($elements as $element) {
            $user = new User();

            $user->set_idUser($element["idUser"]);
            $user->set_pseudo($element["pseudo"]);
            $user->set_motdepasse($element["motdepasse"]);
            $user->set_genre($element["genre"]);

            array_push($users, $user);

        }

        return $users;
    }

    public function tousUserSelon($champ, $valeurChamp)
    {
        include('../data/database.php');

        $users = [];

        $elements = tousElementSelon($database, $this->table, $champ, $valeurChamp);

        foreach ($elements as $element) {
            $user = new User();

            $user->set_idUser($element["idUser"]);
            $user->set_pseudo($element["pseudo"]);
            $user->set_motdepasse($element["motdepasse"]);
            $user->set_genre($element["genre"]);

            array_push($users, $user);

        }

        return $users;
    }
}
