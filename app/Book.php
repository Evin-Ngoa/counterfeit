<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public static $createRules = [
        "id" => "required",
        "type" => "required",
        "author" => "required",
        "edition" => "required ",
        "description" => "required",
        "initialOwner" => "required",
        "sold" => "required",
        "price" => "required"
    ];


    /**
     * Points Conversion Rate
     */
    public static function pointsConversionRate($points){

        $currency = $points / 10;
        // $currency = $points / env('CONVERSION_RATE');

        return $currency;
    }

}
