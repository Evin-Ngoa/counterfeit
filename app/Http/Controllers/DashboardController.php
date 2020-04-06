<?php

namespace App\Http\Controllers;

use App\Services\Book\BookService;
use App\Services\Order\OrderService;
use App\Services\Utils;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $bookservice;
    protected $orderservice;

    public function __construct(
        Utils $utils, 
        BookService $bookservice, 
        OrderService  $orderservice
        )
    {
        $this->utils = $utils;
        $this->bookservice = $bookservice;
        $this->orderservice = $orderservice;

        $this->middleware('check.auth');
        // $this->middleware('auth.book')->except('verify');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = \App\User::getUserRole();
        $email = \App\User::loggedInUserEmail();
        $orders = [];
        
        // Orders
        if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER){
            $orders = $this->orderservice->getOnlyUserOrders($email, 'seller', \App\Http\Traits\UserConstants::PUBLISHER);
        }elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER){
            $orders = $this->orderservice->getOnlyUserOrders($email, 'buyer', \App\Http\Traits\UserConstants::CUSTOMER);
        }elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN){
            $orders = $this->orderservice->getAllOrders();
        }
        $orderCount = count($orders);

        return view('dashboard.index')->with(compact('role','orderCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
