<?php

namespace App\Http\Requests;

use App\Book;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // return Book::$createRules;

        // combine $_REQUEST
        // return array_merge(BlogPost::$createRules, Author::$createRules);

        return [
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
}
