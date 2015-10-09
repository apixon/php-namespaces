<?php
namespace App\lib;
class Partners extends Hotels{
	private $id;
	private $name;
	private $url;  
	protected $datasource;   
	
	function  __construct($data=null) { 
		if(!empty($data)){ 
			parent::__construct($data);
			$this->$datasource = $data;	
		}	
	}
	public function getPartners($data){
		$partners ='';
		$Prices = new Prices();
		if(!empty($data)){ 
			foreach($data as  $id => $partner){
				$partners[$id]['name'] = $partner->name; // get Partner name. data from db 
				$partners[$id]['url'] = $partner->url; // get Partner url. data from db   
				$partners[$id]['prices'] = $Prices->getPrices($partner->prices); 
			}
		}
		return $partners;
	}
}

?>