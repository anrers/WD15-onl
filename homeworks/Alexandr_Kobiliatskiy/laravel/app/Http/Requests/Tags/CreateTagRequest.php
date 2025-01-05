<?php

namespace App\Http\Requests\Tags;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

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
            'name' => 'required|string|max:255|min:3|unique:tags,name',
        ];
    }
}
