<?php
	class DB
	{
		private $conn;

		public function __construct()
		{
			require "secret.php";

			try
			{
				$this->conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
			}
			catch(PDOException $e)
			{
				die("Anslutningen misslyckades: " . $e->getMessage() );
			}
		}

		public function __destruct()
		{
			$this->conn = null;
		}

		public function fetch()
		{
			$query = "select * from GUESTBOOK";

			$statement = $this->conn->prepare($query);
			$statement->execute();	//EXECUTE EXECUTE EXECUTE EXECUTE
			return $statement->fetchAll();
		}

		public function insert($name, $message)
		{
			error_reporting(-1);
			ini_set('display_errors', 'On');
			$query = "insert into GUESTBOOK(NAME, MESSAGE) values(:name, :message)";

			$statement = $this->conn->prepare($query);
			$statement->bindParam(":name", $name);
			$statement->bindParam(":message", $message);
			$statement->execute();	//EXECUTE EXECUTE EXECUTE EXECUTE
		}

		public function delete($id)
		{
			error_reporting(-1);
			ini_set('display_errors', 'On');
			$query = "delete from GUESTBOOK where id = :id";

			$statement = $this->conn->prepare($query);
			$statement->bindParam(":id", $id);
			$statement->execute();
		}
	}
?>
