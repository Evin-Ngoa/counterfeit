<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\Book;

class BookController extends Controller
{
    protected $book;

    public function __construct(Book $book)
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

        // $page_title = PageTitles::ROLES;

        // $breadcrumbs = PageTitles::ROLES;

        // return view('roles.index')->with(compact('roles', 'page_title','breadcrumbs'));

        // return view('welcome');

        // $client = new \GuzzleHttp\Client();
        // $request = $client->get('http://localhost:3000/api/Book');
        // $response = $request->getBody()->getContents();
        // dd($response);

        // Get all the post
    	$books = $this->book->all();
        // dd($books[0]->id);
        dd($books);

    
    }
}
