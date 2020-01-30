<?php
namespace App\Services\Book;

use GuzzleHttp\Client;
use App\Services\Utils;

class BookService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }
    /**
     * Get all Book Records
     */
    public function getAllBooks(){
        return $this->utils->all('/Book');
    }
    
    /**
     * Track Book Ownership
     */
	public function getBookSupplyChain($id){
		
		// Get specific book to track
        $book = $this->utils->findById('/Book/', $id);

        $shipment = explode('#', $book->shipment);
        $shipId = $shipment[1];
        $class = $shipment[0];

        // Get specific Shipment and check ownership
        $shipmentDetails = $this->utils->findById('/Shipment/', $shipId);

        // dd($shipmentDetails->shipOwnership);
        $owners = $shipmentDetails->shipOwnership;

        return $owners;
	}
   
}