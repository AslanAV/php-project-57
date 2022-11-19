<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'status_id' => 'required',
            'assigned_to_id' => 'required',
            'description' => '',
            'labels' => '',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('controllers.required_error'),
            'status_id.required' => __('controllers.required_error'),
            'assigned_to_id.required' => __('controllers.required_error'),
        ];
    }
}
