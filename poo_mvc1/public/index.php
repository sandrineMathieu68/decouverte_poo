<?php

require '../app/Autoloader.php'; 
App\Autoloader::register(); 


// le get est mis dans la varible $p
if(isset($_GET['p'])){

	$p = $_GET['p'];

}else{
	$p = 'home';
}

//INITIALISATION DES OBJETS 
$db = new App\Database('films');

// pour vérifier manuellement des fonctions et faire des choses différentes
ob_start(); // pour lui dire que tout ce que tu affiches est stocké dans une variable
if($p === 'home'){

	require '../pages/home.php';

}elseif($p === 'article'){

	require '../pages/single.php';
}

$content = ob_get_clean();
require '../pages/templates/default.php';


