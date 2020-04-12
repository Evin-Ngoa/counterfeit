<?php

namespace App\Http\Controllers;

use App\Services\Shipment\ShipmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShipmentController extends Controller
{
    protected $shipmentservice;

    public function __construct(ShipmentService  $shipmentservice)
    {
        $this->shipmentservice = $shipmentservice;

        $this->middleware('check.auth');
        $this->middleware('auth.admin')->only('index');
        $this->middleware('auth.shipment');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shipments = $this->shipmentservice->getAllShipments();
        // dd($shipments);

        return view('shipments.index')->with(compact('shipments'));
    }

    /**
     * Checking Owner Shipments
     */
    public function view_shipments($id)
    {

        $isSame = \App\User::active($id);

        if (!$isSame) {
            // dd($isSame);
            $userEmail = \App\User::loggedInUserEmail();
            // dd($userEmail);
            return Redirect::route('shipment.view', [$userEmail]);
        }

        $shipment = $this->shipmentservice->getAllShipments();

        $shipments = array();
        $array = array();

        if (\App\User::getUserRole() == \App\Http\Traits\UserConstants::PUBLISHER) {
            foreach ($shipment as $key => $value) {
                    
                if ($shipment[$key]->contract->seller->email == $id) {
                    $array[ $key ] = $value;
                    $shipments = $array;
                }

            }
        } else if(\App\User::getUserRole() == \App\Http\Traits\UserConstants::CUSTOMER){
            foreach ($shipment as $key => $value) {

                if ($shipment[$key]->contract->buyer->email == $id) {
                    $array[ $key ] = $value;
                    $shipments = $array;
                }
            }
        } else if(\App\User::getUserRole() == \App\Http\Traits\UserConstants::DISTRIBUTOR){
            // dd($shipment);
            
            foreach ($shipment as $key => $value) {
                // dd(count($shipment[$key]->shipOwnership));
                // if the array has owners
                if(count($shipment[$key]->shipOwnership) > 0){
                    // loop shipowners
                    foreach ($shipment[$key]->shipOwnership as $keys => $values) {
                        if ($shipment[$key]->shipOwnership[$keys]->owner->email == $id) {
                            $array[ $key ] = $value;
                            $shipments = $array;
                        }
                    }
                }
                
            }
        }
        // dd($shipments );
        return view('shipments.index')->with(compact('shipments'));
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
        $shipment = $this->shipmentservice->getSingleShipment($id);

        return response()->json([
            'error' => false,
            'shipment'  => $shipment,
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
        $shipment = $this->shipmentservice->getSingleShipment($id);

        return response()->json([
            'error' => false,
            'shipment'  => $shipment,
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
