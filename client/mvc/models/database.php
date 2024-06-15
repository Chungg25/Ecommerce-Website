<?php

class Database
{
	public $conn = NULL;
	private $server = 'localhost';
	private $dbName = 'Ecommerce-Website';
	private $user = 'root';
	private $password = '';
        
	public function connect()
	{
		$this->conn = new mysqli($this->server, $this->user, $this->password, $this->dbName);

		if ($this->conn->connect_error) {
			printf($this->conn->connect_error);
			exit();
		}

		$this->conn->set_charset("utf8");
	}

        public function closeDatabase()
	{
		if ($this->conn) {
			$this->conn->close();
		}
	}
	public function prepare($sql) {
        return $this->conn->prepare($sql);
    }
}
?>