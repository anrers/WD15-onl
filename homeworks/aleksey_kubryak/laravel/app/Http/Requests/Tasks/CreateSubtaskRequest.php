<?php

namespace App\Http\Requests\Tasks;

use App\Http\Requests\BaseRequest;

class CreateSubtaskRequest extends BaseRequest
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
            'name' => 'required|string|max:255',
            'task_id' => 'required|exists:tasks,id',
        ];
    }
}
