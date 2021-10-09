<?php

session_start();
if (isset($_SESSION['idUser'])) {
    include 'vues/sommaire.php';
}
if (isset($_REQUEST['controleur'])) {
    switch ($_REQUEST['controleur']) {
        case 'login':
            include 'controleur/cltLogin.php';
        break;

        case 'user':
            include 'controleur/cltUser.php';
        break;

        case 'stage':
            include 'controleur/cltStage.php';
        break;

        case 'company':
            include 'controleur/cltCompany.php';
        break;
    }
}

if (!isset($_SESSION['idUser'])) {
    include 'vues/login/formLogin.php';
}

include 'vues/pied.php';
