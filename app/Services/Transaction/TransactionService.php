<?php
namespace App\Services\Transaction;

use App\Services\Utils;

class TransactionService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }

    /**
     * Get all Transaction Records
     */
    public function getAllTransactions(){
        return $this->utils->allRelations('/system/historian');
    }

}