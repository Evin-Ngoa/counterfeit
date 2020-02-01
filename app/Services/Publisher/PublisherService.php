<?php
namespace App\Services\Publisher;

use App\Services\Utils;

class PublisherService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }
    /**
     * Get all Publisher Records
     */
    public function getAllPublishers(){
        return $this->utils->all('/Publisher');
    }
   
}