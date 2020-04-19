<?php
namespace App\Services\Order;

use App\Http\Traits\OrderConstants;
use App\Services\Utils;

class OrderService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }

    /**
     * Get Orders by Users
     * http://localhost:3001/api/queries/getPublisherOrders?seller=resource:org.evin.book.track.Publisher%23publisher2@gmail.com
     */
    public function getOnlyUserOrders($id, $action ,$user){
        return $this->utils->findById('/queries/get'.$user.'Orders?'.$action.'=resource:org.evin.book.track.'.$user.'%23',  $id);
    }
    
    /**
     * Get all Order Records
     */
    public function getAllOrders(){
        return $this->utils->allRelations('/OrderContract');
    }

    /**
     * 
     */
    public function getProcessedOrders(){
        return $this->utils->findByColumnWhereRelationResolved('/OrderContract','orderStatus', OrderConstants::PROCESSED);
    }

    /**
     * 
     */
    public function getCancelledOrders(){
        return $this->utils->findByColumnWhereRelationResolved('/OrderContract','orderStatus',OrderConstants::SHIP_CANCELED);
    }

    /**
     * 
     */
    public function getLostOrders(){
        return $this->utils->findByColumnWhereRelationResolved('/OrderContract','orderStatus',OrderConstants::SHIP_LOST);
    }

    /**
     * Get Single Order
     */
    public function getSingleOrder($id){
        return $this->utils->findByIdRelation('/OrderContract/', $id);
    }
   
}