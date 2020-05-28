# counterfeit
Counterfeit System for books Using hyperledger fabric


<img src="data:image/png;base64, 
{!! base64_encode(QrCode::format('png')->merge('https://www.w3adda.com/wp-content/uploads/2019/07/laravel.png', 0.3, true)
->size(200)->errorCorrection('H')
->generate('W3Adda Laravel Tutorial')) !!} "> 


// Run all Mix tasks...
> npm run dev

// Run all Mix tasks and minify output...
> npm run production

> npm run watch


{
  "$class": "org.evin.book.track.OrderContract",
  "contractId": "CON_001",
  "buyer": "resource:org.evin.book.track.Customer#customer@gmail.com",
  "seller": "resource:org.evin.book.track.Publisher#publisher1@gmail.com",
  "arrivalDateTime": "2020-05-25T19:34:55.176Z",
  "payOnArrival": true,
  "unitPrice": 500,
  "quantity": 200,
  "description": "Mathematics, Class 4, 3rd Edition",
  "destinationAddress": "Loita Street, Barclays Plaza, Flr 12",
  "orderStatus": "WAITING",
  "lateArrivalPenaltyFactor": 0.15,
  "damagedPenaltyFactor": 0.2,
  "lostPenaltyFactor": 0.5,
  "createdAt": "2020-05-24T22:34:55.403Z"
}


Urls in mobile and data
=============================================================================
Book Verification
http://localhost:8000/api/qrcodes/{id} 

http://localhost:8000/api/qrcodes/BOOK_001 

Respond Success
{
  "success": true,
  "data": {
    "$class": "org.evin.book.track.Book",
    "id": "BOOK_001",
    "type": "Kiswahili",
    "author": "Wallah Bin Wallah",
    "edition": "3rd Edition",
    "description": "Description Goes Here",
    "sold": false,
    "price": 450,
    "location": {
      "$class": "org.evin.book.track.Location",
      "latLong": "3.0435,59.6682"
    },
    "addedBy": "resource:org.evin.book.track.Publisher#publisher1@gmail.com",
    "shipment": "resource:org.evin.book.track.Shipment#SHIP_001",
    "createdAt": "2020-05-28T23:32:27.567Z"
  },
  "message": "Qrcode retrieved successfully."
}

Respond Failure
{
  "success": false,
  "data": "Book Does not exist",
  "status_code": 404
}
------------------------------------------------------------------------------

http://localhost:8000/api/profile/{id}

http://localhost:8000/api/profile/customer@gmail.com

Respond Success
{
  "success": true,
  "data": {
    "$class": "org.evin.book.track.Customer",
    "isRetailer": "0",
    "email": "customer@gmail.com",
    "memberId": "D-002",
    "firstName": "Peter",
    "lastName": "Kiama",
    "userName": "pk-kiama",
    "secret": "kaaradapk",
    "firstTimeLogin": 1,
    "address": {
      "$class": "org.evin.book.track.Address",
      "county": "NAIROBI",
      "country": "KENYA",
      "street": "Kenyatta Avenue",
      "zip": "047"
    },
    "accountBalance": 5000000,
    "createdAt": "2020-05-28T23:32:27.567Z"
  },
  "message": "Retriving Customer Profile Successfully"
}

Respond Failure
{
  "success": false,
  "data": "Customer Does not exist",
  "status_code": 404
}

---------------------------------------------------------------------

http://localhost:8000/api/login/{email-id}/{secret}

http://localhost:8000/api/login/customer@gmail.com/kaaradapk

Respond Success

{
  "data": {
    "$class": "org.evin.book.track.Customer",
    "isRetailer": "0",
    "email": "customer@gmail.com",
    "memberId": "D-002",
    "firstName": "Peter",
    "lastName": "Kiama",
    "userName": "pk-kiama",
    "secret": "kaaradapk",
    "firstTimeLogin": 1,
    "address": {
      "$class": "org.evin.book.track.Address",
      "county": "NAIROBI",
      "country": "KENYA",
      "street": "Kenyatta Avenue",
      "zip": "047"
    },
    "accountBalance": 5000000,
    "createdAt": "2020-05-28T23:32:27.567Z"
  },
  "order_count": 1,
  "orders": [
    {
      "$class": "org.evin.book.track.OrderContract",
      "contractId": "CON_001",
      "buyer": "resource:org.evin.book.track.Customer#customer@gmail.com",
      "seller": "resource:org.evin.book.track.Publisher#publisher1@gmail.com",
      "arrivalDateTime": "2020-05-29T20:32:27.395Z",
      "payOnArrival": true,
      "unitPrice": 500,
      "quantity": 200,
      "description": "Mathematics, Class 4, 3rd Edition",
      "destinationAddress": "Loita Street, Barclays Plaza, Flr 12",
      "orderStatus": "WAITING",
      "lateArrivalPenaltyFactor": 0.15,
      "damagedPenaltyFactor": 0.2,
      "lostPenaltyFactor": 0.5,
      "createdAt": "2020-05-28T23:32:27.567Z"
    }
  ],
  "status_code": 200
}

Respond Failure

{
  "success": false,
  "data": "Invalid Username / Password",
  "status_code": 401
}
----------------------------------------------------------------------
