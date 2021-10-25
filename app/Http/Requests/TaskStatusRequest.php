<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                Rule::unique('task_statuses', 'name')->ignore($this->task_status)
            ]
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.unique' => __('validation.errors.task_statuses.unique')
        ];
    }
}
