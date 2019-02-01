<?php
	class File
	{
		private $file;

		public function __construct($path)
		{
			$this->file = $path;
		}

		public function write($data)
		{
			if($this->file = fopen("db.txt", "a"))
			{
				//echo "File is open\n";
			}
			else
			{
				die("File did not open\n");
			}

			if(fwrite($this->file, $data) )
			{
				//echo "Successful write\n";
			}
			else 
			{
				die("Did not write\n");
			}

			if(fclose($this->file) )
			{
				//echo "File is closed";
			}
			else
			{
				die("File did not close.");
			}
		}

		public function read_all()
		{
			$data = "";
			if($this->file = fopen("db.txt", "r"))
			{
				//echo "File is open\n";
			}
			else
			{
				die("File did not open\n");
			}

			while(!feof($this->file) )
			{
				$data .= fread($this->file, 8192);
			}

			if(fclose($this->file) )
			{
				//echo "File is closed";
			}
			else
			{
				die("File did not close.");
			}

			return $data;
		}
	}
?>
