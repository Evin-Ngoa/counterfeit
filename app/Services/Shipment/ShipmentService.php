<?php
namespace App\Services\Shipment;

use App\Http\Traits\OrderConstants;
use App\Services\Utils;

class ShipmentService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }
    /**
     * Get all Shipment Records
     */
    public function getAllShipments(){
        return $this->utils->allRelations('/Shipment');
    }

    /**
     * Get Single Shipment
     */
    public function getSingleShipment($id){
        // return $this->utils->findById('/Shipment/', $id);
        return $this->utils->findByIdRelation('/Shipment/', $id);
    }

    /**
     * 
     */
    public function getWaitingShipments(){
        return $this->utils->findByColumnWhereRelationResolved('/Shipment','ShipmentStatus', OrderConstants::WAITING);
    }

    /**
     * 
     */
    public function getDispatchedShipments(){
        return $this->utils->findByColumnWhereRelationResolved('/Shipment','ShipmentStatus',OrderConstants::SHIP_DISPATCHING);
    }

    /**
     * 
     */
    public function getTransitShipments(){
        return $this->utils->findByColumnWhereRelationResolved('/Shipment','ShipmentStatus',OrderConstants::SHIP_SHIPPED_IN_TRANSIT);
    }

    /**
     * 
     */
    public function getDeliveredShipments(){
        return $this->utils->findByColumnWhereRelationResolved('/Shipment','ShipmentStatus',OrderConstants::SHIP_DELIVERED);
    }

   
}