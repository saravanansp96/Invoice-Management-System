<?php 
class Database {
	public $connection;
	public function createConnection(){
		$config = parse_ini_file('databaseConfig.ini');
		try {
			$this->connection = new PDO("mysql:host=".$config['hostname'].";dbname=".$config['dbname'], $config['username'], $config['password']);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e) { 
			echo "unable to create the connection";
			$this->connection = null;
		}
	}
	public function closeConnection(){
		$this->connection = null;
	}
}
?>