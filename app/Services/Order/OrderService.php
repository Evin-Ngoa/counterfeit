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

    public function getOnlyUserOrders($id, $user){
        return $this->utils->findById('/queries/getPublisherOrders?seller=resource:org.evin.book.track.'.$user.'%23',  $id);
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