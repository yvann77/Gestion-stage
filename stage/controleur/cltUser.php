<?php

require_once './modele/modelUser.php';
$action = $_REQUEST['action'];

switch ($action) {
    case 'listeUser':{
        $lignes = modelUser::getAllUser();
        include 'vues/user/vuelisteuser.php';

        break;
    }


    case 'UnUser':{
        $idUser = $_SESSION['idUser'];
        $lignes = modelUser::getUnUser($idUser);
        include 'vues/user/vuelisteuseretudianttuteur.php';

        break;
    }

    case "deleteUser" :{
            {
                $idUser = $_GET['idUser'];
                modelUser::deleteUser($idUser);
                $lignes = modelUser::getAllUser(); 
        
                include 'vues/user/vuelisteuser.php';
                break;
            }
}

case "newUser" :{

	if(isset($_POST['valider']))
	{
	
		$login = $_POST['login'];
		$password = $_POST['password'];
		$categ = $_POST['categ'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$mail = $_POST['mail'];
		$classroom = $_POST['classroom'];


		$lignes = modelUser::newUser($login, $password, $categ, $lastname, $firstname, $mail, $classroom);
	}

	include 'vues/user/newUser.php';
	break; 
}

case "updateUser" :{
	{
		
		$idUser = $_GET['idUser'];
		$unUser = modelUser::getUser($idUser); 
		include 'vues/user/formModifUser.php';
		break;
	}
	
}

case "updateUnUser" :{
	{
		$idUser = $_SESSION['idUser'];
		$unUseer = modelUser::getUnUser($idUser); 
		include 'vues/user/formModifUnUser.php';
		break;
	}
	
}

case "modifUser" :{

	if(isset($_POST['valider']))
	{
	
		$idUser = $_POST['idUser'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$categ = $_POST['categ'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$mail = $_POST['mail'];
        $classroom = $_POST['classroom'];
			

		$lignes = modelUser::modifUser($idUser, $login, $password, $categ, $lastname, $firstname, $mail, $classroom);

		$lignes = modelUser::getAllUser(); 
		include 'vues/user/vuelisteuser.php';
	}

	break; 
}

case "modifUnUser" :{

	if(isset($_POST['valider']))
	{
	
        $idUser = $_SESSION['idUser'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$mail = $_POST['mail'];
			

		$lignes = modelUser::modifUnUser($idUser, $login, $password, $lastname, $firstname, $mail);

		$lignes = modelUser::getUnUser($idUser); 
		include 'vues/user/vuelisteuseretudianttuteur.php';
	
	}

	break; 
}

case "searchUser" :{
    {
        $recherche = $_POST['s'];
        $lignes = modelUser::searchAllUser($recherche); 
        include 'vues/user/vuelisteuser.php';

        break;
    }

    break; 
}

}
