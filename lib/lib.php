<?php 
namespace App;
require('classes/Hotels.php');
require('classes/Partners.php');
require('classes/Prices.php');
class PartnerService{
	
	protected $Hotels; 
	protected $datasource;
	
	function __construct(){
		$this->datasource = $this->datasource() ;
	}
	private function datasource(){
		$data=file_get_contents("data/15475.json"); 
		return json_decode($data);
	}
	public function showdata(){ 
		$Hotels = new lib\Hotels();		
		foreach($this->datasource->hotels as $hotel){
			$this->Hotels = $Hotels->getHotels($this->datasource); 
		}
		return $this->Hotels;
	} 
}

?>