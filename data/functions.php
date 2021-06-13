<?php

function nouveauUser($database, $content)
{
    $requete = "INSERT INTO user SET idUser = " . $content['idUser'] . ", pseudo = " . $content['pseudo'] . ", motdepasse = " . $content['motdepasse'] . ", genre = " . $content['genre'] . "";
    $nbModifications = $database->exec($requete);

    return $nbModifications;
}

function nouveauMessage($database, $content)
{
    $requete = "INSERT INTO message SET idMessage = " . $content['idMessage'] . 
    ", destinateur = " . $content['destinateur'] .
    ", destinataire = " . $content['destinataire'] .
    ", texte = " . $content['texte'] .
    ", idGroupe = " . $content['idGroupe'] . 
    ", dateRegister = " . $content['dateRegister'] . "";
    $nbModifications = $database->exec($requete);

    return $nbModifications;
}

function nouveauRdv($database, $content)
{
    $requete = "INSERT INTO rdv SET idResponsable = " . $content['idResponsable'] . ", nom = " . $content['nom'] . ", prenoms = " . $content['prenoms'] . ", telephone = " . $content['telephone'] . ", email = " . $content['email'] . ", motif = " . $content['motif'] . ", date = " . $content['date'] . ", heure = " . $content['heure'] . ", confirmation = " . $content['confirmation'] . ", createdAt = " . $content['createdAt'] . ", updatedAt = " . $content['updatedAt'] . "";
    //echo $requete;
    //die();
    $nbModifications = $database->exec($requete);

    return $nbModifications;
}

function tousElement($database, $table)
{
    $requete = "SELECT * FROM " . $table;
    $reponse = $database->query($requete);
    $data = $reponse->fetchAll();

    return $data;
    $reponse->closeCursor();
    $data = NULL;
}

function dernierRdv($database, $table)
{
    $requete = "SELECT * FROM " . $table . 
    " WHERE idRdv = ( SELECT MAX(idRdv) FROM rdv ) ";
    $reponse = $database->query($requete);
    $data = $reponse->fetchAll();

    

    return $data;
    $reponse->closeCursor();
    $data = NULL;
}

function tousElementSelon($database, $table, $champ, $valeurChamp)
{
    $requete = "SELECT * FROM " . $table . " WHERE " . $champ . "=" . $valeurChamp;
    $reponse = $database->query($requete);
    $data = $reponse->fetchAll();

    return $data;
    $reponse->closeCursor();
    $data = NULL;
}

function rechercheElementSelon($database, $table, $champ, $valeurModele)
{
    $requete = "SELECT * FROM " . $table . " WHERE " . $champ . " LIKE " . $valeurModele;
    $reponse = $database->query($requete);
    $data = $reponse->fetchAll();

    return $data;
    $reponse->closeCursor();
    $data = NULL;
}

function modifierElementSelon($database, $table,  $cible, $valeurCible, $champModif, $valeurChampModif)
{
    try {
        $requete = "UPDATE " . $table . " SET " . $champModif . "=" . $valeurChampModif .
            " WHERE " . $cible . "=" . $valeurCible;
        $nbModifications = $database->exec($requete);

        return $nbModifications;
    } catch (Exception $e) {
        die("Erreur:" . $e->getMessage());
    }
}

function supprimerElementSelon($database, $table,  $cible, $valeurCible)
{
    try {
        $requete = "DELETE FROM " . $table . " WHERE " . $cible . "=" . $valeurCible;
        $nbModifications = $database->exec($requete);

        return $nbModifications;
    } catch (Exception $e) {
        die("Erreur:" . $e->getMessage());
    }
}

function vaVers($route)
{
    header('Location: ' . $route);
}

function gencode($motcle)
{
    $nb1 =  0;
    $nb2 = 900000;
    $nb  = rand($nb1, $nb2);
    $code = $motcle . '-' . $nb;

    return $code;
}

function today()
{
    $today = date("Y-m-d H:i:s");
    return $today;
}

function dateOfToday()
{
    $dateOfToday = date("Y-m-d H:i:s");
    return $dateOfToday;
}

function varchar($variable)
{
    return '"' . $variable . '"';
}
