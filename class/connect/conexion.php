<?php

date_default_timezone_set("America/Bogota");

class Conexion{
	
    private static $instancia;
    private $dbh;
 
    private function __construct() {
       
	    try {
		
			$this->dbh = new PDO('mysql:host=localhost;dbname=performance_modulo', 'root','');
            $this->dbh->exec("utf8");

        } catch (PDOException $e) {

            print "Error!: " . $e->getMessage();
            die();
        }
    }

    public function prepare($sql) {

        return $this->dbh->prepare($sql);

    }
	
	
	public function UltimoIDInsertado() {

        return $this->dbh->lastInsertId();

    }
 
    public static function singleton_conexion(){

        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;

        }
        return self::$instancia;   
    }

   
}