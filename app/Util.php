<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Util extends Model
{
    /**
     * Remote API FUnction
     */
    public static function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'APIKEY: 111111111111111111111',
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }

     /**
      * Base 
      */
     public static function baseAPIUrl(){

        $url = "http://localhost:3001";
        return $url;
     }

     /**
      * Base SMS API Key
      */
     public static function smsAPIKey(){

        $apiKey = '3c6e9bd992e111ebafdee808f1d72715d60a61b670532aaca30fdd19b4646dff';
        return $apiKey;
     }

     /**
      * Base SMS Number
      */
     public static function smsNumber(){

        $phoneNumber = '+254701864761';
        return $phoneNumber;
     }

}