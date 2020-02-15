<?php
namespace App\Services\Customer;

use App\Services\Utils;

class CustomerService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }
    /**
     * Get all Customer Records
     */
    public function getAllCustomers(){
        return $this->utils->all('/Customer');
    }

    /**
     * Get Single Customer 
     */
    public function getSingleCustomer($id){
        return $this->utils->findById('/Customer/', $id);
    }
   
}