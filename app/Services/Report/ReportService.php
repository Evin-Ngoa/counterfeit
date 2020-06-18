<?php
namespace App\Services\Report;


use App\Services\Utils;

class ReportService
{
    protected $utils;

	public function __construct(Utils $utils)
	{
		$this->utils = $utils;
    }

    /**
     * http://localhost:3001/api/Report/?filter={%22include%22:%22resolve%22}
     */
    public function getAllReports(){
        return $this->utils->allRelations('/Report');
    }
    
}