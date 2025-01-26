<?php

namespace App\Http\Requests\Tasks;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class CreateTaskRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'dueDate' => ['required', 'date', 'date_format:Y-m-d'],
            'description' => ['nullable', 'string', 'max:1000'],
            'images' => ['nullable'],
        ];
    }
}
