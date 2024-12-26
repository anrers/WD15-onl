<?php

namespace App\Http\Requests\Tasks;


use App\Http\Requests\BaseRequest;

class CreateTaskRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'dueDate' => ['required', 'date', 'date_format:Y-m-d'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
