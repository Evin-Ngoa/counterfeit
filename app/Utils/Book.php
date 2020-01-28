<?php
namespace App\Utils;

use GuzzleHttp\Client;

class Book
{
    protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
    }
    
    public function all()
	{
        return $this->endpointRequest('/Book');
        
    }
    
    public function findById($id)
	{
		return $this->endpointRequest('/Book/'.$id);
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