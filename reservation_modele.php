<?php
class Reservation
{
	private  $destination;
	private  $Nb_place;
	private $assurance = 0;
	
	public function __construct($destination,$Nb_place)
	
	{
		$this->destination = $destination;
		$this->Nb_place = $Nb_place;
		//$this->assurance = $assurance;
	 }
	 
	public function getNb_place()
	
	{return $this->Nb_place;}
	
	public function getdestination()
	
	{return $this->destination;}
	
	public function getassurance()
	
	{return $this->assurance;}
	

}
?>