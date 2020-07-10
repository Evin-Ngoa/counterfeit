<?php
namespace App\Services\Book;

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
        // dd($this->utils->all('/Book'));
        return $this->utils->all('/Book');
    }

    public function getPublisherBooks($id){
        return $this->utils->getMyBook('/queries/getPublisherBooks?addedBy=resource:org.evin.book.track.Publisher%23',  $id);
    }
    
    public function getSingleBook($id){
        return $this->utils->findById('/Book/', $id);
    }

    public function getSingleBookByRelation($id){
        return $this->utils->findByIdRelation('/Book/', $id);
    }
    
    /**
     * Track Book Ownership
     */
	public function getBookSupplyChain($id){
		
        $bookRelations = $this->utils->findByIdRelationResolved('/Book/', $id);
        // dd($bookRelations);
        
        return $bookRelations;
    }
    
    /**
     * Track Book Ownership
     */
	public function storeBook($request){
		
        $bookRelations = $this->utils->storeItem('/Book/', $request);
        // dd($bookRelations);
        
        return $bookRelations;
    }
    
    /**
     * http://localhost:3001/api/Book/?filter={"where":{"addedBy":"resource:org.evin.book.track.Publisher#moran@gmail.com"},"include":"resolve"}
     */
    public function getPublisherBooksStats(){
        return $this->utils->findByColumnWhereRelationResolved('/Book','addedBy', \App\User::loggedInUserEmail());
    }
   
}