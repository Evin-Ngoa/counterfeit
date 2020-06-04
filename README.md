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

dropdown Select Location dependent
https://phppot.com/jquery/jquery-dependent-dropdown-list-countries-and-states/

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
   "success":true,
   "data":{
      "$class":"org.evin.book.track.Book",
      "id":"BOOK_001",
      "type":"Kiswahili",
      "author":"Wallah Bin Wallah",
      "edition":"3rd Edition",
      "description":"Description Goes Here",
      "sold":false,
      "price":450,
      "location":{
         "$class":"org.evin.book.track.Location",
         "latLong":"3.0435,59.6682"
      },
      "addedBy":{
         "$class":"org.evin.book.track.bookNetMember",
         "email":"publisher1@gmail.com",
         "memberId":"P-001",
         "name":"Longhorn Publishers",
         "userName":"longhorn-publishers",
         "secret":"kaarada",
         "firstTimeLogin":1,
         "address":{
            "$class":"org.evin.book.track.Address",
            "county":"NAIROBI",
            "country":"KENYA",
            "street":"Loita Street",
            "zip":"047"
         },
         "accountBalance":0,
         "createdAt":"2020-06-04T20:26:36.084Z"
      },
      "shipment":{
         "$class":"org.evin.book.track.Shipment",
         "shipmentId":"SHIP_hRSgxcVWU7",
         "ShipmentStatus":"DELIVERED",
         "itemStatus":"GOOD",
         "unitCount":2,
         "bookRegisterShipment":[
            {
               "$class":"org.evin.book.track.BookRegisterShipment",
               "book":{
                  "$class":"org.evin.book.track.Book",
                  "id":"BOOK_001",
                  "type":"Kiswahili",
                  "author":"Wallah Bin Wallah",
                  "edition":"3rd Edition",
                  "description":"Description Goes Here",
                  "sold":false,
                  "price":450,
                  "location":{
                     "$class":"org.evin.book.track.Location",
                     "latLong":"3.0435,59.6682"
                  },
                  "addedBy":{
                     "$class":"org.evin.book.track.bookNetMember",
                     "email":"publisher1@gmail.com",
                     "memberId":"P-001",
                     "name":"Longhorn Publishers",
                     "userName":"longhorn-publishers",
                     "secret":"kaarada",
                     "firstTimeLogin":1,
                     "address":{
                        "$class":"org.evin.book.track.Address",
                        "county":"NAIROBI",
                        "country":"KENYA",
                        "street":"Loita Street",
                        "zip":"047"
                     },
                     "accountBalance":0,
                     "createdAt":"2020-06-04T20:26:36.084Z"
                  },
                  "shipment":"resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
                  "createdAt":"2020-06-04T20:26:36.084Z"
               },
               "shipment":"resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
               "transactionId":"e4b568745e553c88e061d62ad5e9b96cf59522de2cbb99c72e90b3f7e6ecbab3",
               "timestamp":"2020-06-04T17:58:42.418Z"
            },
            {
               "$class":"org.evin.book.track.BookRegisterShipment",
               "book":{
                  "$class":"org.evin.book.track.Book",
                  "id":"BOOK_002",
                  "type":"English",
                  "author":"Oludhe McGoyie",
                  "edition":"2nd Edition",
                  "description":"Description Goes Here",
                  "sold":false,
                  "price":650,
                  "location":{
                     "$class":"org.evin.book.track.Location",
                     "latLong":"36.0435,80.6682"
                  },
                  "addedBy":{
                     "$class":"org.evin.book.track.bookNetMember",
                     "email":"publisher2@gmail.com",
                     "memberId":"P-002",
                     "name":"Kenya Bureau Of Statitics",
                     "userName":"kbs-publishers",
                     "secret":"kaaradakbs",
                     "firstTimeLogin":1,
                     "address":{
                        "$class":"org.evin.book.track.Address",
                        "county":"MOMBASA",
                        "country":"KENYA",
                        "street":"Loita Street",
                        "zip":"001"
                     },
                     "accountBalance":0,
                     "createdAt":"2020-06-04T20:26:36.084Z"
                  },
                  "shipment":"resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
                  "createdAt":"2020-06-04T20:26:36.084Z"
               },
               "shipment":"resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
               "transactionId":"2bc8ff472d74ba0d48b2a3483450c04dbeb2c8288d16d788eeef0bbccaf43652",
               "timestamp":"2020-06-04T17:59:05.919Z"
            }
         ],
         "shipOwnership":[
            {
               "$class":"org.evin.book.track.ShipOwnership",
               "owner":{
                  "$class":"org.evin.book.track.bookNetMember",
                  "email":"publisher1@gmail.com",
                  "memberId":"P-001",
                  "name":"Longhorn Publishers",
                  "userName":"longhorn-publishers",
                  "secret":"kaarada",
                  "firstTimeLogin":1,
                  "address":{
                     "$class":"org.evin.book.track.Address",
                     "county":"NAIROBI",
                     "country":"KENYA",
                     "street":"Loita Street",
                     "zip":"047"
                  },
                  "accountBalance":0,
                  "createdAt":"2020-06-04T20:26:36.084Z"
               },
               "shipment":"resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
               "transactionId":"2488f55a49390d402461cd6026c4aaf735f59daadd1f1dd9dfd8b4a432a6d6b6",
               "timestamp":"2020-06-04T17:55:33.940Z"
            },
            {
               "$class":"org.evin.book.track.ShipOwnership",
               "owner":{
                  "$class":"org.evin.book.track.bookNetMember",
                  "email":"distributor@gmail.com",
                  "memberId":"D-001",
                  "name":"Book Distributors Kenya",
                  "userName":"bdk-ditributors",
                  "secret":"kaaradabdk",
                  "firstTimeLogin":1,
                  "address":{
                     "$class":"org.evin.book.track.Address",
                     "county":"NAIROBI",
                     "country":"KENYA",
                     "street":"Mfangano Street",
                     "zip":"047"
                  },
                  "accountBalance":2000000,
                  "createdAt":"2020-06-04T20:26:36.084Z"
               },
               "shipment":"resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
               "transactionId":"b772294eaaf96d03584494b96c849eb1e9e28446f30027cfa7c031bd861f2696",
               "timestamp":"2020-06-04T17:59:33.718Z"
            },
            {
               "$class":"org.evin.book.track.ShipOwnership",
               "owner":{
                  "$class":"org.evin.book.track.bookNetMember",
                  "email":"customer@gmail.com",
                  "memberId":"D-002",
                  "firstName":"Peter",
                  "lastName":"Kiama",
                  "userName":"pk-kiama",
                  "secret":"kaaradapk",
                  "firstTimeLogin":1,
                  "address":{
                     "$class":"org.evin.book.track.Address",
                     "county":"NAIROBI",
                     "country":"KENYA",
                     "street":"Kenyatta Avenue",
                     "zip":"047"
                  },
                  "accountBalance":5000000,
                  "createdAt":"2020-06-04T20:26:36.084Z"
               },
               "shipment":"resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
               "transactionId":"90ad455dea65210f88f5323b591492600a03942173aa7a8026acf6dfe8934dc9",
               "timestamp":"2020-06-04T18:22:37.495Z"
            }
         ],
         "contract":{
            "$class":"org.evin.book.track.OrderContract",
            "contractId":"CON_DBn1jTnJoT",
            "buyer":{
               "$class":"org.evin.book.track.Customer",
               "isRetailer":"0",
               "email":"customer@gmail.com",
               "memberId":"D-002",
               "firstName":"Peter",
               "lastName":"Kiama",
               "userName":"pk-kiama",
               "secret":"kaaradapk",
               "firstTimeLogin":1,
               "address":{
                  "$class":"org.evin.book.track.Address",
                  "county":"NAIROBI",
                  "country":"KENYA",
                  "street":"Kenyatta Avenue",
                  "zip":"047"
               },
               "accountBalance":5000000,
               "createdAt":"2020-06-04T20:26:36.084Z"
            },
            "seller":{
               "$class":"org.evin.book.track.Publisher",
               "email":"publisher1@gmail.com",
               "memberId":"P-001",
               "name":"Longhorn Publishers",
               "userName":"longhorn-publishers",
               "secret":"kaarada",
               "firstTimeLogin":1,
               "address":{
                  "$class":"org.evin.book.track.Address",
                  "county":"NAIROBI",
                  "country":"KENYA",
                  "street":"Loita Street",
                  "zip":"047"
               },
               "accountBalance":0,
               "createdAt":"2020-06-04T20:26:36.084Z"
            },
            "arrivalDateTime":"2020-06-11T00:00:00.000Z",
            "payOnArrival":true,
            "unitPrice":300,
            "quantity":2,
            "description":"Social Studies",
            "destinationAddress":"Nairobi, Loita Street, Barclays Plaza, Floor 12",
            "orderStatus":"DELIVERED",
            "createdAt":"2020-06-04T20:40:14.000Z"
         },
         "createdAt":"2020-06-04T20:55:30.000Z"
      },
      "createdAt":"2020-06-04T20:26:36.084Z"
   },
   "message":"Qrcode retrieved successfully."
}

Respond Failure
{
  "success": false,
  "data": "Unknown \"Book\" id \"BOOK_004\".",
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



Composer Data 
BOOKS
------------
{
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
  "shipment": "resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
  "createdAt": "2020-06-04T20:26:36.084Z"
}

{
  "$class": "org.evin.book.track.Book",
  "id": "BOOK_002",
  "type": "English",
  "author": "Oludhe McGoyie",
  "edition": "2nd Edition",
  "description": "Description Goes Here",
  "sold": false,
  "price": 650,
  "location": {
    "$class": "org.evin.book.track.Location",
    "latLong": "36.0435,80.6682"
  },
  "addedBy": "resource:org.evin.book.track.Publisher#publisher2@gmail.com",
  "shipment": "resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
  "createdAt": "2020-06-04T20:26:36.084Z"
}

New OrderContact
---------------------
{
  "$class": "org.evin.book.track.OrderContract",
  "contractId": "CON_DBn1jTnJoT",
  "buyer": "resource:org.evin.book.track.Customer#customer@gmail.com",
  "seller": "resource:org.evin.book.track.Publisher#publisher1@gmail.com",
  "arrivalDateTime": "2020-06-11T00:00:00.000Z",
  "payOnArrival": true,
  "unitPrice": 300,
  "quantity": 2,
  "description": "Social Studies",
  "destinationAddress": "Nairobi, Loita Street, Barclays Plaza, Floor 12",
  "orderStatus": "DELIVERED",
  "createdAt": "2020-06-04T20:40:14.000Z"
}

New Shipment
----------------------
{
  "$class": "org.evin.book.track.Shipment",
  "shipmentId": "SHIP_hRSgxcVWU7",
  "ShipmentStatus": "DELIVERED",
  "itemStatus": "GOOD",
  "unitCount": 2,
  "bookRegisterShipment": [
    {
      "$class": "org.evin.book.track.BookRegisterShipment",
      "book": "resource:org.evin.book.track.Book#BOOK_001",
      "shipment": "resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
      "transactionId": "e4b568745e553c88e061d62ad5e9b96cf59522de2cbb99c72e90b3f7e6ecbab3",
      "timestamp": "2020-06-04T17:58:42.418Z"
    },
    {
      "$class": "org.evin.book.track.BookRegisterShipment",
      "book": "resource:org.evin.book.track.Book#BOOK_002",
      "shipment": "resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
      "transactionId": "2bc8ff472d74ba0d48b2a3483450c04dbeb2c8288d16d788eeef0bbccaf43652",
      "timestamp": "2020-06-04T17:59:05.919Z"
    }
  ],
  "shipOwnership": [
    {
      "$class": "org.evin.book.track.ShipOwnership",
      "owner": "resource:org.evin.book.track.Publisher#publisher1@gmail.com",
      "shipment": "resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
      "transactionId": "2488f55a49390d402461cd6026c4aaf735f59daadd1f1dd9dfd8b4a432a6d6b6",
      "timestamp": "2020-06-04T17:55:33.940Z"
    },
    {
      "$class": "org.evin.book.track.ShipOwnership",
      "owner": "resource:org.evin.book.track.Distributor#distributor@gmail.com",
      "shipment": "resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
      "transactionId": "b772294eaaf96d03584494b96c849eb1e9e28446f30027cfa7c031bd861f2696",
      "timestamp": "2020-06-04T17:59:33.718Z"
    },
    {
      "$class": "org.evin.book.track.ShipOwnership",
      "owner": "resource:org.evin.book.track.Customer#customer@gmail.com",
      "shipment": "resource:org.evin.book.track.Shipment#SHIP_hRSgxcVWU7",
      "transactionId": "90ad455dea65210f88f5323b591492600a03942173aa7a8026acf6dfe8934dc9",
      "timestamp": "2020-06-04T18:22:37.495Z"
    }
  ],
  "contract": "resource:org.evin.book.track.OrderContract#CON_DBn1jTnJoT",
  "createdAt": "2020-06-04T20:55:30.000Z"
}
