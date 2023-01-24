<?php

class Modele {

	private $db; // Object

    public function executeRequete($sql, $parametres = NULL) {
		
		if ($parametres == NULL) {
			
			$result = $this->getBD()->query($sql); //Requête simple
			
		} else {

			$result = $this->getBD()->prepare($sql); // requête préparée
			
			$result->execute($parametres);
		}

		return $result;
	}

	private function getBD() {

		if ($this->db == NULL) {

			$this->db = new PDO('mysql:host=' . SERVEUR . ';dbname=' . BASE, NOM, PASSE, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			
		}
		
		return $this->db;
	}

}
