<?php
namespace App\Table;

use App\App;

class Article{

	//Pour récupérer les pour récuperer les derniers films publié
	public static function getLast(){

		return App::getDb()->query("
			SELECT films.id, films.titre, films.categories.titre as categorie
	    	FROM films 
	    	LEFT JOIN categories 
	    		ON category_id = categories.id
	    ", __CLASS__); 

	}

	public function __get($key){ // attention avec la méthode magic car on cache du code à l'utilisateur
		// IL NE FAUT PAS EN ABUSER
		$method = 'get' . ucfirst($key);

		$this->$key = $this->$method();

		return $this->$key;
	} 

	public function getUrl(){

		return 'index.php?p=article&id=' . $this->id;
	}

	public function getExtrait(){

		$html = '<p>' . substr($this->description, 0, 150) . '...<p>';
		$html .= '<p><a href="' . $this->getURL() .'">Voir la suite</a></p>';

		return $html;
		
	}

}
