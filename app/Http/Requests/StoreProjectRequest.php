<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => 'required|max:50|string',
            'url' => 'required|url:http,https',
            'description' => 'required|max:1000',
            'state' => 'required|max:20|string',
            'priority' => 'required|integer',
            'date' => 'required|date',
            'type_id' => 'required|exists:types,id'
        ];
    }
}
