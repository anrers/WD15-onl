<?php

namespace App\Http\Requests\Tags;

use App\Http\Requests\BaseRequest;
use app\Rules\Uppercase;

class CreateTagRequest extends BaseRequest
{
    public function prepareForValidation()
    {

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
               new Uppercase(),
            ],
        ];
    }

    protected function passedValidation(): void
    {
        $name = $this->input('name');
        $name = mb_strtolower($name);

        $this->merge(['name' => $name]);
    }
}
