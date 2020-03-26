<?php


namespace App\Http\Traits;

interface UserConstants
{
    /**
     * Identifier for role for admin
     */
    const ADMIN = 'Admin';

    /**
     * Identifier role for Publisher
     */
    const PUBLISHER = 'Publisher';
    /**
     * Identifier role for Distributor
     */
    const DISTRIBUTOR = 'Distributor';
    /**
     * Identifier role for Customer
     */
    const CUSTOMER = 'Customer';


    const JAMBO_PAY_SHARED_KEY = '6127482F-35BC-42FF-A466-276C577E7DF3';

}