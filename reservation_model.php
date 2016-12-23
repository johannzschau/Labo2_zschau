<?php
class Reservation
{
	private  $destination;
	private  $Nb_place;
	private $insurance = 0;
	
	public function __construct($destination,$Nb_place,$insurance)
	
	{
		$this->destination = $destination;
		$this->Nb_place = $Nb_place;
		$this->insurance = $insurance;
	 }
	 
	public function getNb_place()
		{
			return $this->Nb_place;
		}
	
	public function getdestination()
		{
			return $this->destination;
		}
	
	public function getinsurance()
		{
			return $this->insurance;
		}
	
}
?>