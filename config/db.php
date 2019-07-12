<?php

class Database{
	public static function connect(){
		$db = new mysqli('localhost', 'root', 'sarampion25', 'RESILIENCIACDMX');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}

