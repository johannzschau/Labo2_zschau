<?php
class person
{
	private  $name;
	private  $age;
	
	
	public function __construct($name,$age)
	
	{
		$this->name = $name;
		$this->age = $age;
		
	 }
	 
	public function getname()
		{
			return $this->name;
		}
	
	public function getage()
		{
			return $this->age;
		}
	
    public function save()
		{
			$_SESSION['person'] = serialize($this);
		}
}
?>