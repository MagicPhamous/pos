<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=sql10.freesqldatabase.com;dbname=sql10519180",
			            "sql10519180",
			            "p9iZSv8JgW");

		$link->exec("set names utf8");

		return $link;

	}

}