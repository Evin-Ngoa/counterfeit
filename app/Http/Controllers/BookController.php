<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookStoreRequest;
use App\Http\Traits\PageTitles;
use Illuminate\Http\Request;
use App\Services\Book\BookService;
use App\Services\Utils;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    protected $bookservice;
    protected $utils;

    public function __construct(Utils $utils, BookService $bookservice)
    {
        $this->utils = $utils;
        $this->bookservice = $bookservice;
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
        $books = $this->bookservice->getAllBooks();
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
            "id" => "required",
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

        return response()->json([
            'error' => false,
            'data'  => 'task',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('roles');
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
