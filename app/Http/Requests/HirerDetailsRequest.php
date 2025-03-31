<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HirerDetailsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'driver_abn' => 'nullable|string|max:255',
            'abn' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'licence_no' => 'nullable|string|max:255',
            'dob' => 'nullable|date|before_or_equal:'.now()->subYears(18)->toDateString(),
            'email' => 'required|email',
            'contact' => 'nullable|string|max:255',

            // for authorised driver table
            'authorised_driver_name' => 'nullable|string|max:255',
            'authorised_driver_dob' => 'nullable|date|before_or_equal:'.now()->subYears(18)->toDateString(),
            'authorised_driver_address' => 'nullable|string|max:255',
            'authorised_driver_license_no' => 'nullable|string|max:255',

            // for assign vehicle table
            'reg_no' => 'required',
            'cost_per_week' => 'nullable',
            'rent_start_date' => 'nullable|date',
            'rent_end_date' => 'nullable|date|after_or_equal:rent_start_date',
            'total_days' => 'nullable',
            'total_price' => 'nullable',
            'deposit_amount' => 'nullable',

            // for RentalAgreement
            'vehicle_id' => 'required',

            // for pdf
            'make' => 'nullable',
            'model' => 'nullable',
            'purchase_date' => 'nullable',
            'odometer' => 'nullable',
            'vin' => 'nullable',
            'company_name' => 'nullable',
            'signature_method' => 'required|string|in:upload,esign',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'esign_data' => 'nullable|string',
        ];
    }
}
