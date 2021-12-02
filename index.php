<?php 
	require_once("Config/Config.php");
	require_once("Helpers/Helpers.php");
	$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home'; //si no enviamos nada a la url, automaticamente manda a home/home
	$arrUrl = explode("/", $url);
	$controller = $arrUrl[0];
	$method = $arrUrl[0];
	$params = "";


	if(!empty($arrUrl[1]))//si existe la posicion 1 del array
	{
		if($arrUrl[1] != "")//es distinto a vacio
		{
			$method = $arrUrl[1];//llama a la variable de la posicion 1 del array
		}
	}

	if(!empty($arrUrl[2]))//si existe la posicion 2
	{
		if($arrUrl[2] != "")//distinto de vacio
		{
			for ($i=2; $i < count($arrUrl); $i++) {
				$params .=  $arrUrl[$i].',';
				# code...
			}
			$params = trim($params,',');//trim remueve el ultimo caracte de una cadena
		}
	}
	require_once("Libraries/Core/Autoload.php");
	require_once("Libraries/Core/Load.php");

 ?>