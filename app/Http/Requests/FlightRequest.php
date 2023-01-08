<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status_id' => 'required|numeric',
            'airport_from' => 'required|numeric',
            'airport_to' => 'required|numeric',
            'departure_time' => 'required',
            'departure_timezone' => 'required|numeric',
            'arrival_time' => 'required',
            'arrival_timezone' => 'required|numeric',
            'passengers' => 'required|numeric',
        ];
    }
}
