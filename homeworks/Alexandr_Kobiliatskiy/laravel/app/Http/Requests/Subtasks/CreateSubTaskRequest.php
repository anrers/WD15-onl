<?php

namespace App\Http\Requests\Subtasks;

use App\Http\Requests\BaseRequest;
use Illuminate\Contracts\Validation\ValidationRule;


class CreateSubTaskRequest extends BaseRequest
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
            'task_id' => 'required|integer|exists:tasks,id',
            'description' => 'nullable|string|max:1000',
            'dueDate' => 'required',
        ];
    }
}
