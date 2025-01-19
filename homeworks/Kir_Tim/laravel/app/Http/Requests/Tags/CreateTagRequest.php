<?php

namespace App\Http\Requests\Tags;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Void_;

class CreateTagRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           'name' => 'required|string|unique:Tags,name|min:2|max:255',
        ];
    }

}
