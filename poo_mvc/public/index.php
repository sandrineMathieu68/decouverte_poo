<?php
// 6 MN 30 a creer une nouvelle table , apprendre a faire jointure
require '../app/Autoloader.php'; 
App\Autoloader::register(); 


// le get est mis dans la varible $p
if(isset($_GET['p'])){

	$p = $_GET['p'];

}else{
	$p = 'home';
}



// pour vérifier manuellement des fonctions et faire des choses différentes
ob_start(); // pour lui dire que tout ce que tu affiches est stocké dans une variable
if($p === 'home'){

	require '../pages/home.php';

}elseif($p === 'article'){

	require '../pages/single.php';
}

$content = ob_get_clean();
require '../pages/templates/default.php';


