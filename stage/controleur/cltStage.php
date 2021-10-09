<?php
require_once './modele/modelStage.php';
$action= $_REQUEST['action'];

switch ($action) {
	case "listeStage" :{
			
		$lignes = modelStage::getAllStage(); 
		include 'vues/stage/vuelistestage.php';
		
		break;
	}

	case "listeStageEtudiantTuteur" :{
			
		$lignes = modelStage::getAllStage(); 
		include 'vues/stage/vuelistestageetudianttuteur.php';
		
		break;
	}

case "newStage" :{

	if(isset($_POST['valider']))
	{
	
		$Company = $_POST['Company'];
		$InternshipName = $_POST['InternshipName'];
		$StartDate = $_POST['StartDate'];
		$EndDate = $_POST['EndDate'];
		$InternshipDescription = $_POST['InternshipDescription'];
		$City = $_POST['City'];
		$ZC = $_POST['ZC'];
		$Region = $_POST['Region'];
		$Mail = $_POST['Mail'];		

		$lignes = modelStage::newStage($Company, $InternshipName, $StartDate, $EndDate, $InternshipDescription, $City, $ZC, $Region, $Mail);

		$lignes = modelStage::getAllStage(); 
		include 'vues/stage/vuelistestage.php';
	}

	include 'vues/stage/newStage.php';
	break; 
}

case "deleteStage" :{
	{
		$idInternship = $_GET['idInternship'];
		modelStage::deleteStage($idInternship);
		$lignes = modelStage::getAllStage(); 

		include 'vues/stage/vuelistestage.php';
		break;

		$lignes = modelStage::getAllStage(); 
		include 'vues/stage/vuelistestage.php';
	}
	
}

case "updateStage" :{
	{
		
		$idInternship = $_GET ['idInternship'];
		$uneOffre = modelStage::getOffre($idInternship); 
		include 'vues/stage/formModifOffre.php';
		break;
	}
	
}

case "modifStage" :{

	if(isset($_POST['valider']))
	{
	
		$idInternship = $_POST['idInternship'];
		$Company = $_POST['Company'];
		$InternshipName = $_POST['InternshipName'];
		$StartDate = $_POST['StartDate'];
		$EndDate = $_POST['EndDate'];
		$InternshipDescription = $_POST['InternshipDescription'];
		$City = $_POST['City'];
		$ZC = $_POST['ZC'];
		$Region = $_POST['Region'];
		$Mail = $_POST['Mail'];		

		$lignes = modelStage::modifStage($idInternship, $Company, $InternshipName, $StartDate, $EndDate, $InternshipDescription, $City, $ZC, $Region, $Mail);

		$lignes = modelStage::getAllStage(); 
		include 'vues/stage/vuelistestage.php';
	}

	break; 
}

case "searchStage" :{
    {
        $recherche = $_POST['s'];
        $lignes = modelStage::searchAllStage($recherche); 
        include 'vues/stage/vuelistestage.php';

        break;
    }

    break; 
}

case "seearchStage" :{
    {
        $recherche = $_POST['s'];
        $lignes = modelStage::seearchAllStage($recherche); 
        include 'vues/stage/vuelistestageetudianttuteur.php';

        break;
    }

    break; 
}



}
?>