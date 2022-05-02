<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StorePostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(["title" => "string", "thumbnail" => "string", "description" => "string", "content" => "string"])] public function rules(): array
    {
        return [
            "title" => "required|min:3|max:255",
            "thumbnail" => "required|image",
            "description" => "required",
            "content" => "required",
        ];
    }
}
