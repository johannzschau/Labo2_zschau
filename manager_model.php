<?php
class manager
{
	private  $ID;

	
	public function __construct($ID)
	
	{
		$this->ID = $ID;
	}
	 
	public function get_ID()
		{
			return $this->ID;
		}
	

	
	

}
?>