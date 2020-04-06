<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Book\BookService;
use App\Services\Utils;
use Illuminate\Support\Facades\Validator;
use Hashids\Hashids;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookController extends Controller
{
    protected $bookservice;
    protected $utils;

    public function __construct(Utils $utils, BookService $bookservice)
    {
        $this->utils = $utils;
        $this->bookservice = $bookservice;

        $this->middleware('check.auth');
        $this->middleware('auth.admin')->only('index');
        $this->middleware('auth.book');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the post
        $books = $this->bookservice->getAllBooks();
        // dd($books);
        return view('books.index')->with(compact('books'));
    }

    /**
     * Checking Owner Books
     */
    public function view_books($id)
    {

        $isSame = \App\User::active($id);

        if(!$isSame){
            // dd($isSame);
            $userEmail = \App\User::loggedInUserEmail();
            // dd($userEmail);
            return Redirect::route('book.view', [$userEmail]);
        }
        
        $books = $this->bookservice->getPublisherBooks($id);
        // dd($books);

        return view('books.index')->with(compact('books'));
    }

    /**
     * Tracking Book Ownership
     */
    public function verify($id)
    {

        $groupOwners = $this->bookservice->getBookSupplyChain($id);

        // dd($groupOwners);

        return view('books.book-verify')->with(compact('groupOwners', 'id'));
    }

    /**
     * Tracking Book Ownership
     */
    public function verify_form()
    {

        // dd('groupOwners');

        return view('books.book-form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('books.create')->with(compact('permissions', 'page_title'));
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->input(), array(
            "type" => "required",
            "author" => "required",
            "edition" => "required ",
            "description" => "required",
            "initialOwner" => "required",
            "sold" => "required",
            "price" => "required"
        ));

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        // Generate Book Id and merge
        $genBookId = $this->random_strings(10);

        $request->merge(['id' => $genBookId]);

        // Save all the post
        $books = $this->bookservice->storeBook($request);

        return response()->json([
            'error' => false,
            'data_sent'  => $request->input(),
            'response'  => $books
        ], 200);
    }

    /**
     * This function will return a random 
     * string of specified length 
     */
    function random_strings($length_of_string)
    {

        // String of all alphanumeric character 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shufle the $str_result and returns substring 
        // of specified length 
        return substr(
            str_shuffle($str_result),
            0,
            $length_of_string
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->bookservice->getSingleBook($id);

        return response()->json([
            'error' => false,
            'book'  => $book,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $role = Role::findOrFail($id);
        // $permissions = Permission::all();
        // $page_title = "Roles";

        // return view('roles.edit', compact('role', 'permissions'));

        $book = $this->bookservice->getSingleBook($id);

        return response()->json([
            'error' => false,
            'book'  => $book,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $role = Role::findOrFail($id);
        // $page_title = "Roles";
        // $role->delete();

        // return redirect()->route('roles.index')
        //     ->with('flash_message',
        //         'Role deleted!');

    }
}
