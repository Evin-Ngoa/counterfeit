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
        $baseUrl = Util::baseAPIUrl();
        $book = Util::callAPI('GET', $baseUrl.'/api/Book/' . $id .'?filter={"include":"resolve"}' ,false);

        $res = json_decode($book);
      
        // If Book does not exist
        if(isset($res->error)){
            return response()->json(
                array(
                    'success'=> false,
                    'data'=> $res->error->message,
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
                    "type" => "Kiswahili",
                    "author" => "Wallah Bin Wallah",
                    "edition" => "3rd Edition",
                    "description" => "Description Goes Here",
                    "sold"=>false,
                    "price"=>450,
                    "location"=> array(
                       "\$class" => "org.evin.book.track.Location",
                       "latLong" => "3.0435,59.6682"
                    ),
                    "addedBy" => array(
                       "\$class" => "org.evin.book.track.bookNetMember",
                       "email" => "publisher1@gmail.com",
                       "memberId" => "P-001",
                       "name" => "Longhorn Publishers",
                       "avatar" => "http://mastercard.us.evincloud.com/public/img/avatar.png",
                       "userName" => "longhorn-publishers",
                       "secret" => "kaarada",
                       "firstTimeLogin"=>1,
                       "address" => array(
                          "\$class" => "org.evin.book.track.Address",
                          "county" => "NAIROBI",
                          "country" => "KENYA",
                          "street" => "Loita Street",
                          "zip" => "047"
                       ),
                       "accountBalance" => 0,
                       "createdAt" => "2020-05-29T09:28:31.628Z"
                    ),
                    "shipment" => array( // continue from here
                       "\$class" => "org.evin.book.track.Shipment",
                       "shipmentId" => "SHIP_BW2hHD4zqF",
                       "ShipmentStatus" => "DELIVERED",
                       "itemStatus" => "GOOD",
                       "unitCount" => 2,
                       "bookRegisterShipment" => array(
                          array(
                             "\$class" => "org.evin.book.track.BookRegisterShipment",
                             "book" => array(
                                "\$class" => "org.evin.book.track.Book",
                                "id" => "BOOK_001",
                                "type" => "Kiswahili",
                                "author" => "Wallah Bin Wallah",
                                "edition" => "3rd Edition",
                                "description" => "Description Goes Here",
                                "sold" => false,
                                "price" => 450,
                                "location" => array(
                                   "\$class" => "org.evin.book.track.Location",
                                   "latLong" => "3.0435,59.6682"
                                 ),
                                "addedBy" => array(
                                   "\$class" => "org.evin.book.track.bookNetMember",
                                   "email" => "publisher1@gmail.com",
                                   "memberId" => "P-001",
                                   "name" => "Longhorn Publishers",
                                   "avatar" => "http://mastercard.us.evincloud.com/public/img/avatar.png",
                                   "userName" => "longhorn-publishers",
                                   "secret" => "kaarada",
                                   "firstTimeLogin" => 1,
                                   "address" => array(
                                      "\$class" => "org.evin.book.track.Address",
                                      "county" => "NAIROBI",
                                      "country" => "KENYA",
                                      "street" => "Loita Street",
                                      "zip" => "047"
                                   ),
                                   "accountBalance" => 0,
                                   "createdAt" => "2020-05-29T09:28:31.628Z"
                                 ),
                                "shipment" => "resource:org.evin.book.track.Shipment#SHIP_BW2hHD4zqF",
                                "createdAt" => "2020-05-29T09:28:31.628Z"
                              ),
                             "shipment" => "resource:org.evin.book.track.Shipment#SHIP_BW2hHD4zqF",
                             "transactionId" => "228c7dcd31bd3f0d7de695aab46fc6ce3944c61f69c5676238d7049bc647a359",
                             "timestamp" => "2020-05-29T08:16:30.334Z"
                         
                           ),
                        array(
                             "\$class" => "org.evin.book.track.BookRegisterShipment",
                             "book" => array(
                                "\$class" => "org.evin.book.track.Book",
                                "id" => "BOOK_002",
                                "type" => "English",
                                "author" => "Oludhe McGoyie",
                                "edition" => "2nd Edition",
                                "description" => "Description Goes Here",
                                "sold" => false,
                                "price" => 650,
                                "location" => array(
                                   "\$class" => "org.evin.book.track.Location",
                                   "latLong" => "36.0435,80.6682"
                                 ),
                                "addedBy" => array(
                                   "\$class" => "org.evin.book.track.bookNetMember",
                                   "email" => "publisher2@gmail.com",
                                   "memberId" => "P-002",
                                   "name" => "Kenya Bureau Of Statitics",
                                   "avatar" => "http://mastercard.us.evincloud.com/public/img/avatar.png",
                                   "userName" => "kbs-publishers",
                                   "secret" => "kaaradakbs",
                                   "firstTimeLogin" => 1,
                                   "address" => array(
                                      "\$class" => "org.evin.book.track.Address",
                                      "county" => "MOMBASA",
                                      "country" => "KENYA",
                                      "street" => "Loita Street",
                                      "zip" => "001"
                                   ),
                                   "accountBalance" => 0,
                                   "createdAt" => "2020-05-29T09:28:31.628Z"
                                 ),
                                "shipment" => "resource:org.evin.book.track.Shipment#SHIP_BW2hHD4zqF",
                                "createdAt" => "2020-05-29T09:28:31.628Z"
                              ),
                             "shipment" => "resource:org.evin.book.track.Shipment#SHIP_BW2hHD4zqF",
                             "transactionId" => "93f2d8e0393955df26c1d2289f38c0af0d817ceed1bd50bac3c5d4d5a1fc176f",
                             "timestamp" => "2020-05-29T08:48:03.889Z"
                       )
                     ),
                       "shipOwnership"=> array(
                         array(
                          
                             "\$class" => "org.evin.book.track.ShipOwnership",
                             "owner"=> array(
                                "\$class" => "org.evin.book.track.bookNetMember",
                                "email" => "publisher1@gmail.com",
                                "memberId" => "P-001",
                                "name" => "Longhorn Publishers",
                                "avatar" => "http://mastercard.us.evincloud.com/public/img/avatar.png",
                                "userName" => "longhorn-publishers",
                                "secret" => "kaarada",
                                "firstTimeLogin" => 1,
                                "address"=> array(
                                   "\$class" => "org.evin.book.track.Address",
                                   "county" => "NAIROBI",
                                   "country" => "KENYA",
                                   "street" => "Loita Street",
                                   "zip" => "047"
                                ),
                                "accountBalance" => 0,
                                "createdAt" => "2020-05-29T09:28:31.628Z"
                              ),
                             "shipment" => "resource:org.evin.book.track.Shipment#SHIP_BW2hHD4zqF",
                             "transactionId" => "e73c931586d50e67d5029b25acaf55f0e29565b1660becc3be7978bc316c6a03",
                             "timestamp" => "2020-05-29T08:00:25.344Z"
                          ),
                          array(
                             "\$class" => "org.evin.book.track.ShipOwnership",
                             "owner"=> array(
                                "\$class" => "org.evin.book.track.bookNetMember",
                                "email" => "distributor@gmail.com",
                                "memberId" => "D-001",
                                "name" => "Book Distributors Kenya",
                                "avatar" => "http://mastercard.us.evincloud.com/public/img/avatar.png",
                                "userName" => "bdk-ditributors",
                                "secret" => "kaaradabdk",
                                "firstTimeLogin" => 1,
                                "address" => array(
                                   "\$class" => "org.evin.book.track.Address",
                                   "county" => "NAIROBI",
                                   "country" => "KENYA",
                                   "street" => "Mfangano Street",
                                   "zip" => "047"
                                ),
                                "accountBalance" => 2000000,
                                "createdAt" => "2020-05-29T09:28:31.628Z"
                              ),
                             "shipment" => "resource:org.evin.book.track.Shipment#SHIP_BW2hHD4zqF",
                             "transactionId" => "f0e870310a33916236cf45c549125249f4c5bdd05dc60be097cb213acd7aedea",
                             "timestamp" => "2020-05-29T08:48:30.164Z"
                           ),
                           array(
                             "\$class" => "org.evin.book.track.ShipOwnership",
                             "owner" => array(
                                "\$class" => "org.evin.book.track.bookNetMember",
                                "email" => "customer@gmail.com",
                                "memberId" => "D-002",
                                "firstName" => "Peter",
                                "lastName" => "Kiama",
                                "userName" => "pk-kiama",
                                "avatar" => "http://mastercard.us.evincloud.com/public/img/avatar.png",
                                "secret" => "kaaradapk",
                                "firstTimeLogin" => 1,
                                "address"=> array(
                                   "\$class" => "org.evin.book.track.Address",
                                   "county" => "NAIROBI",
                                   "country" => "KENYA",
                                   "street" => "Kenyatta Avenue",
                                   "zip" => "047"
                                ),
                                "accountBalance" =>5000000,
                                "createdAt" => "2020-05-29T09:28:31.628Z"
                              ),
                             "shipment" => "resource:org.evin.book.track.Shipment#SHIP_BW2hHD4zqF",
                             "transactionId" => "819a129057d273981759ce08b74eb84eed5b27ccc8f2e832dab2f00e56ba3405",
                             "timestamp" => "2020-05-29T10:10:15.313Z"
                           )
                        
                       ),
                       "contract" => array (
                          "\$class" => "org.evin.book.track.OrderContract",
                          "contractId" => "CON_001",
                          "buyer" => array (
                             "\$class" => "org.evin.book.track.Customer",
                             "isRetailer" => "0",
                             "email" => "customer@gmail.com",
                             "memberId" => "D-002",
                             "firstName" => "Peter",
                             "lastName" => "Kiama",
                             "userName" => "pk-kiama",
                             "secret" => "kaaradapk",
                             "firstTimeLogin" => 1,
                             "address" => array (
                                "\$class" => "org.evin.book.track.Address",
                                "county" => "NAIROBI",
                                "country" => "KENYA",
                                "street" => "Kenyatta Avenue",
                                "zip" => "047"
                             ),
                             "accountBalance" =>5000000,
                             "createdAt" => "2020-05-29T09:28:31.628Z"
                          ),
                          "seller" => array (
                             "\$class" => "org.evin.book.track.Publisher",
                             "email" => "publisher1@gmail.com",
                             "memberId" => "P-001",
                             "name" => "Longhorn Publishers",
                             "avatar" => "http://mastercard.us.evincloud.com/public/img/avatar.png",
                             "userName" => "longhorn-publishers",
                             "secret" => "kaarada",
                             "firstTimeLogin" =>1,
                             "address" => array (
                                "\$class" => "org.evin.book.track.Address",
                                "county" => "NAIROBI",
                                "country" => "KENYA",
                                "street" => "Loita Street",
                                "zip" => "047"
                             ),
                             "accountBalance" =>0,
                             "createdAt" => "2020-05-29T09:28:31.628Z"
                          ),
                          "arrivalDateTime" => "2020-05-30T06:28:31.408Z",
                          "payOnArrival" =>true,
                          "unitPrice" =>500,
                          "quantity" =>2,
                          "description" => "Mathematics, Class 4, 3rd Edition",
                          "destinationAddress" => "Loita Street, Barclays Plaza, Flr 12",
                          "orderStatus" => "DELIVERED",
                          "createdAt" => "2020-05-29T09:28:31.628Z",
                          "updatedAt" => "2020-05-29T10:59:23.000Z"
                       ),
                       "createdAt" => "2020-05-29T11:00:22.000Z"
                     ),
                    "createdAt" => "2020-05-29T09:28:31.628Z"
            
          );

        $resRaw = json_encode($book);

        $res = json_decode($resRaw);

        // If Book does not exist
        if($id != "BOOK_001"){
            return response()->json(
                array(
                    'success'=> true,
                    'data'=> [],
                    'status_code' => 200
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
