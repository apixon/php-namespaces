<?php
namespace App\lib;
class Hotels{
	private $id;
	private $name;
	private $address;
	private $city; 
	protected $datasource;  
	
	function  __construct($data=null){ 
		if(!empty($data)){  
			$this->$datasource = $data;	
		}
	}
	public function getHotels($data){ 
		$hotels ='';  
		$Partners = new Partners(); 
		if(!empty($data)){
			foreach($data->hotels as $id => $hotel){				 
				$hotels[$id]['name'] =  $hotel->name ; // get hotel name. data from db 
				$hotels[$id]['address'] = $hotel->adr ; // get hotel address. data from db
				$hotels[$id]['city'] = $data->city; // get hotel city. data from db
				$hotels[$id]['Partners'] = $Partners->getPartners($hotel->partners); 
				
			}
		}
		return $hotels;
	}
}

?>