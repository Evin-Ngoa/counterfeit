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
        
        $orders = $this->orderservice->getOnlyUserOrders($id, 'Publisher');


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
