<?php
namespace App\Services\Shipment;

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
   
}