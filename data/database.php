<?php

try
{
    $database = new PDO ("mysql:host=localhost; dbname=gchat; charset=utf8",'carion', 'root');
}
catch (Exception $e){
    die ("Erreur:".$e->getMessage());
}

?>
