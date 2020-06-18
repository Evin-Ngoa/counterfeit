<?php

namespace App\Http\Controllers;

use App\Http\Traits\OrderConstants;
use App\Services\Auth\AuthService;
use App\Services\Book\BookService;
use App\Services\Customer\CustomerService;
use App\Services\Distributor\DistributorService;
use App\Services\Order\OrderService;
use App\Services\Publisher\PublisherService;
use App\Services\Report\ReportService;
use App\Services\Shipment\ShipmentService;
use App\Services\Utils;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $bookservice;
    protected $orderservice;
    protected $shipmentservice;
    protected $customerservice;
    protected $publisherservice;
    protected $distributorservice;
    protected $authservice;
    protected $reportservice;

    public function __construct(
        Utils $utils,
        BookService $bookservice,
        OrderService  $orderservice,
        ShipmentService $shipmentservice,
        CustomerService $customerservice,
        PublisherService $publisherservice,
        DistributorService $distributorservice,
        AuthService $authservice,
        ReportService $reportservice
    ) {
        $this->utils = $utils;
        $this->bookservice = $bookservice;
        $this->orderservice = $orderservice;
        $this->shipmentservice = $shipmentservice;
        $this->customerservice = $customerservice;
        $this->publisherservice = $publisherservice;
        $this->distributorservice = $distributorservice;
        $this->authservice = $authservice;
        $this->reportservice = $reportservice;

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
        $array = array();
        $ordersWaitingProcessed = array();
        $ordersDelivered = array();
        $shipments = array();
        $arrayShip = array();
        $arrayDeli = array();
        $purchaseRequests = array();
        $arrayPurchaseRequests = array();
        $report = array();

        // Orders
        if (\App\User::getUserRole() == \App\Http\Traits\UserConstants::PUBLISHER) {
            // 1. PUBLISHER ORDERS STATS
            $array = array();
            $orders = $this->orderservice->getOnlyUserOrders($email, 'seller', \App\Http\Traits\UserConstants::PUBLISHER);

            foreach ($orders as $key => $value) {
                // Active Orders include ; Sum(waiting, processed)  
                if ($orders[$key]->orderStatus == OrderConstants::WAITING || $orders[$key]->orderStatus == OrderConstants::PROCESSED) {
                    $array[$key] = $value;
                    $ordersWaitingProcessed = $array;
                }
            }
            // dd($ordersWaitingProcessed);
            $ordersCount = count($ordersWaitingProcessed);
            // dd($ordersCount);

            // 2. PUBLISHER SHIPMENTS STATS
            $shipmentPub = $this->shipmentservice->getAllShipments();

            foreach ($shipmentPub as $key => $value) {
                // Active Shipments include waiting, dispatching and transit
                if ($shipmentPub[$key]->contract->seller->email == \App\User::loggedInUserEmail() && ($shipmentPub[$key]->ShipmentStatus == OrderConstants::SHIP_WAITING || $shipmentPub[$key]->ShipmentStatus == OrderConstants::SHIP_DISPATCHING || $shipmentPub[$key]->ShipmentStatus == OrderConstants::SHIP_SHIPPED_IN_TRANSIT)) {
                    $arrayShip[$key] = $value;
                    $shipments = $arrayShip;
                }
            }
            // dd($shipments);
            $shipmentsCount = count($shipments);
            // dd($shipmentsCount);

            // 3. PUBLISHER BOOKS STATS
            $booksPub = $this->bookservice->getPublisherBooks($email);
            $booksPubCount = count($booksPub);
            // dd($booksPubCount);

            // 4. Get All Reports
            $reports = $this->reportservice->getAllReports();

            // dd($reports);

            foreach ($reports as $key => $value) {
                // Active Shipments include waiting, dispatching and transit
                if ($reports[$key]->reportedTo->email == \App\User::loggedInUserEmail() && $reports[$key]->isConfirmed == false) {
                    $arrayShip[$key] = $value;
                    $report = $arrayShip;
                }
            }
            // dd($report);
            $reportCount = count($report);
            // dd($reportCount);

            return view('dashboard.index')->with(
                compact(
                    'role', 
                    'ordersCount', 
                    'ordersWaitingProcessed', 
                    'shipmentsCount', 
                    'shipments', 
                    'booksPubCount',
                    'report',
                    'reportCount'
                ));

        } elseif (\App\User::getUserRole() == \App\Http\Traits\UserConstants::CUSTOMER) {
            // 1. CUSTOMER ORDERS STATS
            $orders = $this->orderservice->getOnlyUserOrders($email, 'buyer', \App\Http\Traits\UserConstants::CUSTOMER);

            foreach ($orders as $key => $value) {
                // Active Orders include ; Sum(waiting, processed)  
                if ($orders[$key]->orderStatus == OrderConstants::WAITING || $orders[$key]->orderStatus == OrderConstants::PROCESSED) {
                    $array[$key] = $value;
                    $ordersWaitingProcessed = $array;
                }
            }
            // dd($ordersWaitingProcessed);
            $ordersCount = count($ordersWaitingProcessed);
            // dd($ordersCount);

            // 2. SHIPMENTS STATS
            $shipment = $this->shipmentservice->getAllShipments();

            foreach ($shipment as $key => $value) {
                // Active Shipments include waiting, dispatching and transit
                if ($shipment[$key]->contract->buyer->email == \App\User::loggedInUserEmail() && ($shipment[$key]->ShipmentStatus == OrderConstants::SHIP_WAITING || $shipment[$key]->ShipmentStatus == OrderConstants::SHIP_DISPATCHING || $shipment[$key]->ShipmentStatus == OrderConstants::SHIP_SHIPPED_IN_TRANSIT)) {
                    $arrayShip[$key] = $value;
                    $shipments = $arrayShip;
                }
            }
            // dd($shipments);
            $shipmentsCount = count($shipments);
            // dd($shipmentsCount);

            // 3. ORDERS DELIVERED STATS
            $ordersDeli = $this->orderservice->getOnlyUserOrders($email, 'buyer', \App\Http\Traits\UserConstants::CUSTOMER);

            foreach ($ordersDeli as $key => $value) {
                // Active Orders include ; Sum(waiting, processed)  
                if ($ordersDeli[$key]->orderStatus == OrderConstants::SHIP_DELIVERED) {
                    $arrayDeli[$key] = $value;
                    $ordersDelivered = $arrayDeli;
                }
            }
            // dd($ordersDelivered);
            $ordersDeliveredCount = count($ordersDelivered);
            // dd($ordersDeliveredCount);

            // 4. Get All Purchase Requests
            $purchaseRequest = $this->orderservice->getAllPurchaseRequests();

            // dd($purchaseRequest);

            foreach ($purchaseRequest as $key => $value) {
                // Active Shipments include waiting, dispatching and transit
                if ($purchaseRequest[$key]->purchasedTo->email == \App\User::loggedInUserEmail() && $purchaseRequest[$key]->status == false) {
                    $arrayShip[$key] = $value;
                    $purchaseRequests = $arrayShip;
                }
            }
            // dd($purchaseRequests);
            $purchaseRequestsCount = count($purchaseRequests);
            // dd($purchaseRequestsCount);

            // 5. Get Customer Details

            $customerDetails = $this->authservice->getCustomerDetails($email, $role);

            // dd($customerDetails->accountBalance);

            $points = $customerDetails->accountBalance;

            return view('dashboard.index')->with(
                compact(
                    'role',
                    'ordersCount',
                    'ordersWaitingProcessed',
                    'shipmentsCount',
                    'ordersDeliveredCount',
                    'purchaseRequests',
                    'purchaseRequestsCount',
                    'points'
                )
            );
        } elseif (\App\User::getUserRole() == \App\Http\Traits\UserConstants::ADMIN) {
            $orders = $this->orderservice->getAllOrders();
            $orderCount = count($orders);

            // 1. USERS STATS
            $publishers = $this->publisherservice->getAllPublishers();
            $customers = $this->customerservice->getAllCustomers();
            $distributors = $this->distributorservice->getAllDistributors();

            $publishersCount = count($publishers);
            $customersCount = count($customers);
            $distributorsCount = count($distributors);

            // 2. ORDER STATS
            $array = array();
            $orders = $this->orderservice->getAllOrders();
            foreach ($orders as $key => $value) {
                // Active Orders include ; Sum(waiting, processed)  
                if ($orders[$key]->orderStatus == OrderConstants::WAITING || $orders[$key]->orderStatus == OrderConstants::PROCESSED) {
                    $array[$key] = $value;
                    $ordersWaitingProcessed = $array;
                }
            }
            $ordersCount = count($ordersWaitingProcessed);


            // 3. ADMIN SHIPMENTS STATS
            $shipmentPub = $this->shipmentservice->getAllShipments();

            foreach ($shipmentPub as $key => $value) {
                // Active Shipments include waiting, dispatching and transit
                if ($shipmentPub[$key]->ShipmentStatus == OrderConstants::SHIP_WAITING || $shipmentPub[$key]->ShipmentStatus == OrderConstants::SHIP_DISPATCHING || $shipmentPub[$key]->ShipmentStatus == OrderConstants::SHIP_SHIPPED_IN_TRANSIT) {
                    $arrayShip[$key] = $value;
                    $shipments = $arrayShip;
                }
            }
            // dd($shipments);
            $shipmentsCount = count($shipments);
            // dd($shipmentsCount);

            return view('dashboard.index')->with(compact('role', 'shipmentsCount', 'shipments', 'ordersWaitingProcessed', 'orderCount', 'publishersCount', 'customersCount', 'distributorsCount'));
        } elseif (\App\User::getUserRole() == \App\Http\Traits\UserConstants::DISTRIBUTOR) {

            // 1. DISTRIBUTOR SHIPMENTS STATS
            $shipmentDistr = $this->shipmentservice->getAllShipments();


            foreach ($shipmentDistr as $key => $value) {
                // dd(count($shipment[$key]->shipOwnership));
                // if the array has owners
                if (count($shipmentDistr[$key]->shipOwnership) > 0) {
                    // loop shipowners
                    foreach ($shipmentDistr[$key]->shipOwnership as $keys => $values) {
                        if ($shipmentDistr[$key]->shipOwnership[$keys]->owner->email == $email) {
                            $array[$key] = $value;
                            $shipments = $array;
                        }
                    }
                }
            }
            // dd($shipments);
            $shipmentsCount = count($shipments);
            // dd($shipmentsCount);
            return view('dashboard.index')->with(compact('role', 'shipmentsCount', 'shipments'));
        }
        $orderCount = count($orders);

        return view('dashboard.index')->with(compact('role', 'orderCount'));
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
