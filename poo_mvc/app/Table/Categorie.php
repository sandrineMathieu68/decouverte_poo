<?php
namespace App\Table;

use App\App;

class Categorie{

	private static $table = 'categories';

	public static function all(){
		return App::getDb()->query("
			SELECT *
	    	FROM " . self::$table . "
	    	LEFT JOIN categories 
	    		ON category_id = categories.id
	    ", __CLASS__); 
	}

}
