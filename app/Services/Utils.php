<?php
namespace App\Services;

use GuzzleHttp\Client;

class Utils
{
    protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
    }
    
    /**
     * callURL = '/Book'
     */
    public function all($callURL)
	{
        return $this->endpointRequest($callURL);
        
    }
    
    /**
     * callURL = '/Book/'
     */
    public function findById($callURL,$id)
	{
		return $this->endpointRequest($callURL.$id);
	}

	
	/**
	 * http://localhost:3000/api/Book/?filter={"where":{"id":"BOOK_001"}, "include":"resolve"}
	 * Help resolve the relationships
	 */
	public function findByIdRelationResolved($callURL,$id)
	{
		return $this->endpointRequest($callURL.$id.'?filter={"where":{"id":"'.$id.'"}, "include":"resolve"}');
	}


	public function endpointRequest($url)
	{
		try {
			$response = $this->client->request('GET', env('COMPOSER_API_BASE_URL').$url);
		} catch (\Exception $e) {
            return [];
		}

		return $this->response_handler($response->getBody()->getContents());
	}

	public function response_handler($response)
	{
		if ($response) {
			return json_decode($response);
		}
		
		return [];
	}
}