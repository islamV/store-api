<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>['required' , 'string' , 'max:225'] ,
            'description'=> ['required'] ,
            'category_id' => ['string'] ,
            'quantity' => ['required'  ,'integer' ,'min:1'] ,
            'price' => ['required'  ] ,
            'image' => ['required', 'file', 'max:3072'], // Maximum file size of 3MB (3 * 1024 = 3072 KB)


        ];
    }
}
