<?php

namespace App\Http\Requests\Tags;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Void_;

class CreateTagRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:Tags,name|min:2|max:255',
        ];
    }

    public function prepareForValidation()
    {
        $name = $this->input('name');
        $name = mb_strtolower($name);
        $this->merge([
            'name' => $name
        ]);
    }
//    public function passedValidation(): void
//    {
//        $name = $this->input('name');
//        $name = mb_strtolower($name);
//        $this->replace([
//            'name' => '1111111'
//        ]);
//    }

}
