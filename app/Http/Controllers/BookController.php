<?php

namespace App\Http\Controllers;

use App\Http\Traits\PageTitles;
use Illuminate\Http\Request;
use App\Utils\Book;
use App\Utils\Utils;

class BookController extends Controller
{
    protected $book;

    public function __construct(Utils $book)
    {
    	$this->book = $book;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $roles = Role::all();//Get all roles

        // $page_title = PageTitles::BOOKS;

        // $breadcrumbs = PageTitles::BOOKS;

        // return view('roles.index')->with(compact('roles', 'page_title','breadcrumbs'));

        // return view('welcome');

        // $client = new \GuzzleHttp\Client();
        // $request = $client->get('http://localhost:3000/api/Book');
        // $response = $request->getBody()->getContents();
        // dd($response);

        // Get all the post
    	$books = $this->book->all('/Book');

         return view('books.index')->with(compact('books'));
    
    }
}
