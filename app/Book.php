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
}
