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
            // Nella validazione seguente la regex permette all'utente di inserire un numero di telefono composto da 20 cifre totali compresi i caratteri '+', '()' e '-' per numeri internazionali.
            'phone_number' =>   'required|string|max:20|regex:/^\+?[0-9()\-\s]+$/|unique:restaurants',
            //  Il campo deve corrispondere al modello regolare specificato, che richiede esattamente 11 cifre numeriche.
            'vat_number' => 'required|max:11|regex:/^[0-9]{11}$/|unique:restaurants',
            'types' => 'required|array|min:1',
            'types.*' => 'exists:types,id',
        ];
    }
}
