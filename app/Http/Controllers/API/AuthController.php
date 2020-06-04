<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseApiController as BaseController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Util;

class AuthController extends BaseController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'secret']);
        $baseUrl = Util::baseAPIUrl();

        $validator = Validator::make($credentials, [
            'email' => 'required',
            'secret' => 'required'
        ]);

        if($validator->fails()){
            // return $this->sendError('Validation Error.', $validator->errors()); 
            return response()->json(array('error'=> $validator->errors(),'status_code' => 401 ));      
        }

        $email = $request->email;
        $secret = $request->email;

        $customer = Util::callAPI('GET', $baseUrl.'/api/Customer/'. $email , false);

        $res = json_decode($customer);

        // If Account does not exist
        if(isset($res->error)){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> 'Invalid Username / Password',
                    'status_code' => 401
                )
            );  
        }

        // If Passwords dont match
        if($res->secret != $secret){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> 'Invalid Username / Password',
                    'status_code' => 401
                )
            );  
        }
        
        // http://localhost:3001/api/queries/getCustomerOrders?buyer=resource%3Aorg.evin.book.track.Customer%23customer@gmail.com
        $orders = Util::callAPI('GET', $baseUrl . '/api/queries/getCustomerOrders?buyer=resource%3Aorg.evin.book.track.Customer%23'. $email , false);

        $order = json_decode($orders);

        // var_dump($order);
        $order = count($order);

        return response()->json(
            array(
                'success'=> true,
                'data'=> $res,
                'order' => $order, 
                'status_code' => 200 
            )
        ); 

    }

    /**
     * @GET email, secret
     * Login using 
     */
    public function getLogin($email,$secret){
        $baseUrl = Util::baseAPIUrl();

        $customer = Util::callAPI('GET', $baseUrl . '/api/Customer/'. $email , false);

        $res = json_decode($customer);

        // If Account does not exist
        if(isset($res->error)){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> 'Invalid Username / Password',
                    'status_code' => 401
                )
            );  
        }

        // If Passwords dont match
        if($res->secret != $secret){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> 'Invalid Username / Password',
                    'status_code' => 401
                )
            );  
        }
        
        // http://localhost:3001/api/queries/getCustomerOrders?buyer=resource%3Aorg.evin.book.track.Customer%23customer@gmail.com
        $ordersRaw = Util::callAPI('GET', $baseUrl . '/api/queries/getCustomerOrders?buyer=resource%3Aorg.evin.book.track.Customer%23'. $email , false);

        $orders = json_decode($ordersRaw);

        // var_dump($order);
        $order = count($orders);

        return response()->json(
            array(
                'success'=> true,
                'data'=> $res,
                'order_count' => $order, 
                'orders' => $orders, 
                'status_code' => 200 
                )
        );  
        // return $this->sendResponse($res , 'Customer retrieved successfully.');
        // return response()->json(array('data'=> $res,'status_code' => 200 ));  
    }

    /**
     * @GET email, secret
     * Login using 
     */
    public function getLoginDemo($email,$secret){

        $customer = array(
            "\$class" => "org.evin.book.track.Customer",
            "isRetailer" => "0",
            "email" => "customer@gmail.com",
            "memberId" => "D-002",
            "firstName" => "Peter",
            "lastName" => "Kiama",
            "userName" => "pk-kiama",
            "secret" => "kaaradapk",
            "firstTimeLogin" => 1,
            "address" => array(
              "\$class" => "org.evin.book.track.Address",
              "county" => "NAIROBI",
              "country" => "KENYA",
              "street" => "Kenyatta Avenue",
              "zip" => "047"
            ),
            "accountBalance" => 5000000,
            "createdAt" => "2020-05-28T23:32:27.567Z"
        );;

        $resRaw = json_encode($customer);

        $res = json_decode($resRaw);

        // If Account does not exist
        if($email != "customer@gmail.com"){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> 'Invalid Username / Password',
                    'status_code' => 401
                )
            );  
        }

        // If Passwords dont match
        if($res->secret != $secret){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> 'Invalid Username / Password',
                    'status_code' => 401
                )
            );  
        }
        
        // http://localhost:3001/api/queries/getCustomerOrders?buyer=resource%3Aorg.evin.book.track.Customer%23customer@gmail.com
        $ordersRaw = array(
            array(
                "\$class" => "org.evin.book.track.OrderContract",
                "contractId" => "CON_001",
                "buyer" => "resource:org.evin.book.track.Customer#customer@gmail.com",
                "seller" => "resource:org.evin.book.track.Publisher#publisher1@gmail.com",
                "arrivalDateTime" => "2020-05-29T20:32:27.395Z",
                "payOnArrival" => true,
                "unitPrice" => 500,
                "quantity" => 200,
                "description" => "Mathematics, Class 4, 3rd Edition",
                "destinationAddress" => "Loita Street, Barclays Plaza, Flr 12",
                "orderStatus" => "WAITING",
                "lateArrivalPenaltyFactor" => 0.15,
                "damagedPenaltyFactor" => 0.2,
                "lostPenaltyFactor" => 0.5,
                "createdAt" => "2020-05-28T23:32:27.567Z"
            )
        );

        $resRaw = json_encode($ordersRaw);

        $orders = json_decode($resRaw);

        $order = count($orders);

        return response()->json(
            array(
                'success'=> true,
                'data'=> $res,
                'order_count' => $order, 
                'orders' => $orders, 
                'status_code' => 200 
                )
        );  
        // return $this->sendResponse($res , 'Customer retrieved successfully.');
        // return response()->json(array('data'=> $res,'status_code' => 200 ));  
    }

}