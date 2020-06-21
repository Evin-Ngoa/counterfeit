<?php

namespace App\Http\Controllers;

use App\Http\Traits\OrderConstants;
use App\Http\Traits\UserConstants;
use App\Services\Book\BookService;
use App\Services\Customer\CustomerService;
use App\Services\Distributor\DistributorService;
use App\Services\Order\OrderService;
use App\Services\Publisher\PublisherService;
use App\Services\Shipment\ShipmentService;
use App\Services\Auth\AuthService;
use App\Services\Utils;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $bookservice;
    protected $orderservice;
    protected $shipmentservice;
    protected $customerservice;
    protected $publisherservice;
    protected $distributorservice;
    protected $authservice;

    /**
     * Check if user is loggedin
     */
    public function __construct(
        Utils $utils,
        BookService $bookservice,
        OrderService  $orderservice,
        ShipmentService $shipmentservice,
        CustomerService $customerservice,
        PublisherService $publisherservice,
        DistributorService $distributorservice,
        AuthService $authservice
    ) {
        $this->utils = $utils;
        $this->bookservice = $bookservice;
        $this->orderservice = $orderservice;
        $this->shipmentservice = $shipmentservice;
        $this->customerservice = $customerservice;
        $this->publisherservice = $publisherservice;
        $this->distributorservice = $distributorservice;
        $this->authservice = $authservice;
        $this->middleware('check.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authEmail = User::loggedInUserEmail();
        $authRole = User::getUserRole();

        // 0. Get User Details

        $customerDetails = $this->authservice->getCustomerDetails($authEmail, $authRole);

        // dd($customerDetails->accountBalance);

        $points = $customerDetails->accountBalance;

        if (\App\User::getUserRole() == \App\Http\Traits\UserConstants::PUBLISHER) {
            // BOOKS COUNT
            $booksPub = $this->bookservice->getPublisherBooks($authEmail);
            $booksPubCount = count($booksPub);

            // DELIVER COUNT
            $shipments = array();
            $shipmentPub = $this->shipmentservice->getAllShipments();

            foreach ($shipmentPub as $key => $value) {
                // Active Shipments include waiting, dispatching and transit
                if ($shipmentPub[$key]->contract->seller->email == \App\User::loggedInUserEmail() && ($shipmentPub[$key]->ShipmentStatus == OrderConstants::SHIP_DELIVERED)) {
                    $arrayShip[$key] = $value;
                    $shipments = $arrayShip;
                }
            }
            $shipmentsCount = count($shipments);

            return view('profile.index')->with(compact('authRole', 'authEmail', 'booksPubCount', 'shipmentsCount', 'points'));
        }else if(\App\User::getUserRole() == \App\Http\Traits\UserConstants::DISTRIBUTOR){
            // 1. Active Orders
            $shipments = array();

            $shipmentDistr = $this->shipmentservice->getAllShipments();

            foreach ($shipmentDistr as $key => $value) {
                // dd(count($shipment[$key]->shipOwnership));
                // if the array has owners and its still processing
                if(count($shipmentDistr[$key]->shipOwnership) > 0  && 
                $shipmentDistr[$key]->ShipmentStatus == ($shipmentDistr[$key]->ShipmentStatus == OrderConstants::SHIP_WAITING || $shipmentDistr[$key]->ShipmentStatus == OrderConstants::SHIP_DISPATCHING || $shipmentDistr[$key]->ShipmentStatus == OrderConstants::SHIP_SHIPPED_IN_TRANSIT)){
                    // loop shipowners
                    foreach ($shipmentDistr[$key]->shipOwnership as $keys => $values) {
                        if ($shipmentDistr[$key]->shipOwnership[$keys]->owner->email == $authEmail) {
                            $array[ $key ] = $value;
                            $shipments = $array;
                        }
                    }
                }
                
            }
            // dd($shipments);
            $shipmentsActiveCount = count($shipments);

            // 2. Delivery
            $shipmentsDelivered = array();

            $shipmentDistr = $this->shipmentservice->getAllShipments();

            foreach ($shipmentDistr as $key => $value) {
                // dd(count($shipment[$key]->shipOwnership));
                // if the array has owners and its still processing
                if(count($shipmentDistr[$key]->shipOwnership) > 0  && 
                $shipmentDistr[$key]->ShipmentStatus == OrderConstants::SHIP_DELIVERED){
                    // loop shipowners
                    foreach ($shipmentDistr[$key]->shipOwnership as $keys => $values) {
                        if ($shipmentDistr[$key]->shipOwnership[$keys]->owner->email == $authEmail) {
                            $array[ $key ] = $value;
                            $shipmentsDelivered = $array;
                        }
                    }
                }
                
            }
            // dd($shipmentsDelivered);
            $shipmentsDeliveredCount = count($shipmentsDelivered);

            return view('profile.index')->with(compact('authRole', 'authEmail','shipmentsActiveCount','shipmentsDeliveredCount', 'points'));

        }else if(\App\User::getUserRole() == \App\Http\Traits\UserConstants::CUSTOMER){
            // 1. ACTIVE ORDERS
            $orders = $this->orderservice->getOnlyUserOrders($authEmail, 'buyer', \App\Http\Traits\UserConstants::CUSTOMER);
            $activeOrders = array();
            
            foreach ($orders as $key => $value) {
                // Active Orders include ; Sum(waiting, processed)  
                if ($orders[$key]->orderStatus == OrderConstants::WAITING || $orders[$key]->orderStatus == OrderConstants::PROCESSED) {
                    $array[$key] = $value;
                    $activeOrders = $array;
                }
            }

            // dd($activeOrders);
            $ordersActiveCount = count($activeOrders);

            // 1. DELIVERED ORDERS
            $deliveredOrders = array();

            foreach ($orders as $key => $value) {
                // Active Orders include ; Sum(waiting, processed)  
                if ($orders[$key]->orderStatus == OrderConstants::SHIP_DELIVERED) {
                    $array[$key] = $value;
                    $deliveredOrders = $array;
                }
            }

            $deliveredOrdersCount = count($deliveredOrders);

            return view('profile.index')->with(compact('authRole', 'authEmail', 'ordersActiveCount', 'deliveredOrdersCount', 'points'));

        }

        return view('profile.index')->with(compact('authRole', 'authEmail'));
    }

    /**
     * Upload user profile
     */
    public function update_avatar(Request $request){

        $authEmail = User::loggedInUserEmail();
        $authRole = User::getUserRole();
        $picPath = '/images/';

        $avatarName = User::getParticipantMemberID() .'_avatar_'. time() .request()->avatar->getClientOriginalExtension();
        
        if ($files = $request->file('avatar')) {
            $files->move( public_path() . '/images/', $avatarName);
        }
        
        if($authRole == UserConstants::CUSTOMER){
            $data = json_encode(array('avatar' => $picPath . $avatarName , "customer" => "resource:org.evin.book.track.".$authRole."#". $authEmail ));   
        }else if($authRole == UserConstants::PUBLISHER){
            $data = json_encode(array('avatar' => $picPath .$avatarName , "publisher" => "resource:org.evin.book.track.".$authRole."#". $authEmail ));
        }else if($authRole == UserConstants::DISTRIBUTOR){
            $data = json_encode(array('avatar' => $picPath .$avatarName , "distributor" => "resource:org.evin.book.track.".$authRole."#". $authEmail ));
        }
 
        $get_data = User::callAPI('POST', 'http://localhost:3001/api/' .'upload'. $authRole .'ProfilePic', $data);
        $response = json_decode($get_data, true);

        if(isset($response['error']['statusCode'])){
            $message =  $response['error']['message'];

            return Response()->json([
                "success" => false,
                "image" => '',
                "message" => $message
            ]);
        }else{
            $message = "Profile Image Uploaded Successfully";
        }
        return Response()->json([
            "success" => true,
            "image" => '',
            "message" => $message
        ]);

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
