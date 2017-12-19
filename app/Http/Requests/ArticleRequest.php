<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "title" => ["required", "string", "max:200"],
            "article" => ["required", "string", "min:50"],
        ];
    }
}
