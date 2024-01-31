<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'restaurant_name' => 'required|max:255|string',
            'restaurant_description' => 'required|max:600|string',
            'restaurant_address' => 'required|max:255|string',
            'restaurant_image' =>   'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone_number' =>   'required|max:999999999999|integer',
            'vat_number' => 'required|max:99999999999|integer|unique:restaurants',
            'types.*' => 'required|exists:types,id',
        ];
    }
}
