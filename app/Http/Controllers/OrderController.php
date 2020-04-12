<?php

namespace App\Http\Controllers;

use App\Services\Order\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    protected $orderservice;

    public function __construct(OrderService  $orderservice)
    {
        $this->orderservice = $orderservice;

        $this->middleware('check.auth');
        $this->middleware('auth.admin')->only('index');;
        $this->middleware('auth.order');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = $this->orderservice->getAllOrders();
        // dd($orders);

        return view('orders.index')->with(compact('orders'));
    }

    /**
     * Checking Owner Orders
     */
    public function view_orders($id)
    {

        $isSame = \App\User::active($id);

        if(!$isSame){

            $userEmail = \App\User::loggedInUserEmail();

            return Redirect::route('order.view', [$userEmail]);
        }
        
        if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER){
            $orders = $this->orderservice->getOnlyUserOrders($id, 'seller', \App\Http\Traits\UserConstants::PUBLISHER);

        }elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER){
            $orders = $this->orderservice->getOnlyUserOrders($id, 'buyer', \App\Http\Traits\UserConstants::CUSTOMER);
        }elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN){
            $orders = $this->orderservice->getAllOrders();
        }

        // dd(count($orders));
        return view('orders.index')->with(compact('orders'));
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
        $order = $this->orderservice->getSingleOrder($id);

        return response()->json([
            'error' => false,
            'order'  => $order,
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
        //
        $order = $this->orderservice->getSingleOrder($id);

        return response()->json([
            'error' => false,
            'order'  => $order,
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
