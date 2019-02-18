<?php
	class File
	{
		private $file;

		public function __construct($path)
		{
			$this->file = $path;
		}

		public function write($data, $flags)
		{
			$file;
			if($file = fopen($this->file, $flags))
			{
				//echo "File is open\n";
			}
			else
			{
				echo $flags;
				die("File did not open for write");
			}

			if(fwrite($file,  $data) )
			{
				//echo "Successful write\n";
			}
			else 
			{
				die("Did not write\n");
			}

			if(fclose($file) )
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
			$file;
			if($file = fopen($this->file, "r"))
			{
				//echo "File is open\n";
			}
			else
			{
				die("File did not open for read");
			}

			while(!feof($file) )
			{
				$data .= fread($file, 8192);
			}

			if(fclose($file) )
			{
				//echo "File is closed";
			}
			else
			{
				die("File did not close.");
			}

			return $data;
		}

		public function delete($index)
		{
			$data = $this->read_all();
			$data = explode(PHP_EOL, $data);
			array_splice($data, $index, 1);
			$data = implode(PHP_EOL, $data);
			$this->write($data, "w");
		}
	}
?>
