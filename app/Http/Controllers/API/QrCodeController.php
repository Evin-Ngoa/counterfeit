<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseApiController as BaseController;
use Validator;
use App\Qrcode;
use App\Util;

class QrCodeController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qrcode = Qrcode::all();

        return $this->sendResponse(
            $qrcode->toArray(), 'QrCode retrieved successfully.'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'detail' => 'required'
        ]);

        if($validator->fails()){  
            return response()->json(array('error'=> $validator->errors(),'status_code' => 401 ));
        }

        $qrcode = Qrcode::create($input);

        return $this->sendResponse($qrcode->toArray(), 'QrCode created successfully.');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Util::callAPI('GET', 'http://localhost:3001/api//Book/'. $id ,false);

        $res = json_decode($book);

        // If Book does not exist
        if(isset($res->error)){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> 'Book Does not exist',
                    'status_code' => 404
                )
            );  
        }
        
        return $this->sendResponse($res , 'Qrcode retrieved successfully.', );
    }

     /**
     * Hard Coded above.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDemo($id)
    {

          $book =  array(
            "\$class" => "org.evin.book.track.Book",
            "id" => "BOOK_001",
            "type"=> "Kiswahili",
            "author" => "Wallah Bin Wallah",
            "edition" => "3rd Edition",
            "description" => "Description Goes Here",
            "sold" => false,
            "price" => 450,
            "location" =>  array(
                '$class'=> 'org.evin.book.track.Location',
                'latLong'=> '3.0435,59.6682'
            ),
            "addedBy" => "resource:org.evin.book.track.Publisher#publisher1@gmail.com",
            "shipment" => "resource:org.evin.book.track.Shipment#SHIP_001",
            "createdAt" => "2020-05-28T23:32:27.567Z"
          );

        $resRaw = json_encode($book);

        $res = json_decode($resRaw);

        // If Book does not exist
        if($id != "BOOK_001"){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> 'Book Does not exist',
                    'status_code' => 404
                )
            );  
        }
        
        return $this->sendResponse($res , 'Qrcode retrieved successfully.', );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qrcode $qrcode)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'detail' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $qrcode->detail = $input['detail'];
        $qrcode->save();

        return $this->sendResponse($qrcode->toArray(), 'Qrcode updated successfully.');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qrcode $qrcode)
    {
        $qrcode->delete();

        return $this->sendResponse($qrcode->toArray(), 'Qrcode deleted successfully.');
    }
}
