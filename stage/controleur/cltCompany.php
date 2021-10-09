<?php
require_once './modele/modelCompany.php';
$action= $_REQUEST['action'];

switch ($action) {
	case "listeCompany" :{

		$lignes = modelCompany::getAllCompany();
		include 'vues/company/vuelistecompany.php';

		break;
	}

	/*case "uneCompany" :{

		$idCompany = $_GET ['idCompany'];
		$CompanyName = $_GET['CompanyName'];
		$CompanyCity = $_GET['CompanyCity'];
		$CompanyZC = $_GET['CompanyZC'];
		$CompanyRegion = $_GET['CompanyRegion'];
		$CompanyFax = $_GET['CompanyFax'];
        $CompanyMail = $_GET['CompanyMail'];

		$lignes = modelCompany::uneCompany();
		//$lignes = modelCompany::uneCompany($idCompany, $CompanyName, $CompanyCity, $CompanyZC, $CompanyRegion, $CompanyFax, $CompanyMail);
		$uneCompany = modelCompany::uneCompany($idCompany);
		//$lignes = modelCompany::getAllCompany();
		include 'vues/stage/vuelistestageetudianttuteur.php';

		break;

	}*/

case "newCompany" :{

	if(isset($_POST['valider']))
	{

		$CompanyName = $_POST['CompanyName'];
		$CompanyCity = $_POST['CompanyCity'];
		$CompanyZC = $_POST['CompanyZC'];
		$CompanyRegion = $_POST['CompanyRegion'];
		$CompanyFax = $_POST['CompanyFax'];
    $CompanyMail = $_POST['CompanyMail'];

		$lignes = modelCompany::newCompany($CompanyName, $CompanyCity, $CompanyZC, $CompanyRegion, $CompanyFax, $CompanyMail);

		include 'vues/company/vuelistecompany.php';
	}

	include 'vues/company/newCompany.php';
	break;
}



case "deleteCompany" :{
	{
		$idCompany = $_GET['idCompany'];
		modelCompany::deleteCompany($idCompany);
		$lignes = modelCompany::getAllCompany();

		include 'vues/company/vuelistecompany.php';
		break;

		$lignes = modelCompany::getAllCompany();
		include 'vues/company/vuelistecompany.php';
	}

}

case "updateCompany" :{
	{

		$idCompany = $_GET ['idCompany'];
		$uneCompany = modelCompany::getCompany($idCompany);
		include 'vues/company/formModifCompany.php';
		break;
	}

}

case "modifCompany" :{

	if(isset($_POST['valider']))
	{

		$CompanyName = $_POST['CompanyName'];
		$CompanyCity = $_POST['CompanyCity'];
		$CompanyZC = $_POST['CompanyZC'];
		$CompanyRegion = $_POST['CompanyRegion'];
		$CompanyFax = $_POST['CompanyFax'];
        $CompanyMail = $_POST['CompanyMail'];

		$lignes = modelCompany::newCompany($CompanyName, $CompanyCity, $CompanyZC, $CompanyRegion, $CompanyFax, $CompanyMail);

		$lignes = modelCompany::getAllCompany();
		include 'vues/company/vuelistecompany.php';
	}

	break;
}

case "searchCompany" :{
    {
        $recherche = $_POST['s'];
        $lignes = modelCompany::searchAllCompany($recherche);
        include 'vues/company/vuelistecompany.php';

        break;
    }

    break;
}



}
?>
