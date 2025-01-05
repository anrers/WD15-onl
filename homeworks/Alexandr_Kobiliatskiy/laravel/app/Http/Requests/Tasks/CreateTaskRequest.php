<?php

namespace App\Http\Requests\Tasks;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|string|max:255|unique:tasks,name|min:3',
            'description' => 'nullable|string|max:1000',
            'dueDate' => 'required',
        ];
    }
}
