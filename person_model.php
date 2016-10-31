<?php
class person
{
	private  $nom;
	private  $age;
	
	
	public function __construct($nom,$age)
	
	{
		$this->nom = $nom;
		$this->age = $age;
		
	 }
	 
	public function getnom()
	
	{return $this->nom;}
	
	public function getage()
	
	{return $this->age;}
	
    public function save()
	{
	$_SESSION['person'] = serialize($this);
	}
	

}
?>