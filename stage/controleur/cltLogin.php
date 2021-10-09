<?php

include './modele/modelPdo.php';
include './modele/modelUser.php';
$action = $_REQUEST['action'];

switch ($action) {
    case 'veriflogin':

        $ident = $_POST['login'];
        $mdp = $_POST['password'];
        $resultat = modelUser::existLogin($ident, $mdp);
        if (is_array($resultat)) {
            $_SESSION['idUser'] = $resultat['idUser'];
            $_SESSION['categ'] = $resultat['categ'];
            $_SESSION['login'] = $resultat['login'];
            $_SESSION['password'] = $resultat['password'];

            header('location: index.php');
        } else {
            header('location: index.php');
        }
        if (isset($_SESSION['login'])) {
    echo "Bonjour ".$_SESSION['login'];
}

    break;

    case 'sedeconnecter':
         session_unset();
         unset($_SESSION['idUser']);
         session_destroy();
         header('location: index.php');
    break;
}
