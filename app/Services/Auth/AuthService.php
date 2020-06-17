<?php
namespace App\Services\Auth;

use App\Services\Utils;

class AuthService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }
    /**
     * Get all Users Records
     */
    public function getAllAdmins(){
        return $this->utils->all('/Admin');
    }

    /**
     * Get Single User 
     */
    public function getSingleUser($id){
        $admin = $this->utils->findById('/Admin/', $id);
        $customer = $this->utils->findById('/Customer/', $id);
        $distributor = $this->utils->findById('/Distributor/', $id);
        $publisher = $this->utils->findById('/Publisher/', $id);
        dd("admin => ". $admin . "customer => " . $customer . "distributor => " . $distributor . "publisher => " . $publisher);
        // return $this->utils->findById('/Distributor/', $id);
    }

    /**
     * Get User Details
     */
    public function getCustomerDetails($email, $role){
        return $this->utils->findByIdRelation('/'. $role .'/', $email);
    }
   
}