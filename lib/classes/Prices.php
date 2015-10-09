<?php
namespace App\lib;
class Prices  extends Partners{
	private $id;
	private $amount;
	private $From_Date;
	private $To_Date;
	protected $datasource;
	
	function  __construct($data=null) {
		if(!empty($data)){ 
			parent::__construct($data);
			$this->$datasource = $data;	
		}	
	}
	public function getPrices($data){
		$prices ='';
		if(!empty($data)){ 
			foreach($data  as  $id => $price){			  
				$prices[$id]['description']  =  $price->description; // get Price  description. data from db
				$prices[$id]['amount']  =  $price->amount; // get Price  amount. data from db
				$prices[$id]['From_Date'] =  $price->from; // get Price  From_Date. data from db
				$prices[$id]['To_Date']  =  $price->to; // get Price  To_Date. data from db
			}
		}
		return $prices;
	}
}
?>