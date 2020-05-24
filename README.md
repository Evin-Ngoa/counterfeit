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