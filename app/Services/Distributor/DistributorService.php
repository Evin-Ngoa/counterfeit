<?php
namespace App\Services\Distributor;

use App\Services\Utils;

class DistributorService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }
    /**
     * Get all Distributor Records
     */
    public function getAllDistributors(){
        return $this->utils->all('/Distributor');
    }
   
}