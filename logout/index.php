<?php

session_start();

require('../data/functions.php');



if(isset($_SESSION['pseudo'])) {
    session_unset();
    session_destroy();
    vaVers('../scon/');
} else {
    vaVers('../');
}