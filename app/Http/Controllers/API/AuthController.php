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

        $customer = Util::callAPI('GET', 'http://localhost:3001/api/Customer/'. $email , false);

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
        $orders = Util::callAPI('GET', 'http://localhost:3001/api/queries/getCustomerOrders?buyer=resource%3Aorg.evin.book.track.Customer%23'. $email , false);

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

    public function getLogin($email,$secret){

        $customer = Util::callAPI('GET', 'http://localhost:3001/api/Customer/'. $email , false);

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
        $ordersRaw = Util::callAPI('GET', 'http://localhost:3001/api/queries/getCustomerOrders?buyer=resource%3Aorg.evin.book.track.Customer%23'. $email , false);

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

}