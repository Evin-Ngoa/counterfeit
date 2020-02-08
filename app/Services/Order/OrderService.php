<?php
namespace App\Services\Order;

use App\Services\Utils;

class OrderService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }
    
    /**
     * Get all Order Records
     */
    public function getAllOrders(){
        return $this->utils->allRelations('/OrderContract');
    }

    /**
     * Get Single Order
     */
    public function getSingleOrder($id){
        return $this->utils->findById('/OrderContract/', $id);
    }
   
}