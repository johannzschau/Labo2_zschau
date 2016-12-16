<?php
class error
{
	private  $error;
	
	
	public function __construct($error)
	
	{
		$this->error = $error;
	
	 }
	 
	public function geterror()
	
	{return $this->error;}
	
	

}
?>