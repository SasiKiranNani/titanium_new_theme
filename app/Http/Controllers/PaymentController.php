<?php

namespace App\Http\Controllers;

use App\Http\Requests\HirerDetailsRequest;
use App\Services\PayadvantageService;

class PaymentController extends Controller
{
    public $customerCode = null;

    public function initiate(PayadvantageService $payadvantageService, HirerDetailsRequest $request)
    {
        $customerResponse = $payadvantageService->retrieveCustomer();
        $customerRecords = $customerResponse->json()['Records'];
        foreach ($customerRecords as $customer) {
            if ($customer['Email'] === $request->email) {
                $this->customerCode = $customer['Code'];
                break;
            }
        }

        if ($this->customerCode === null) {
            $customer = $payadvantageService->createCustomer($request->driver_abn, $request->name, $request->licence_no, $request->email, $request->dob, $request->contact);
            $this->customerCode = $customer->json()['Code'];
        }

        if ($this->customerCode !== null) {
            $payment = $payadvantageService->createPayment($this->customerCode, $request->driver_abn, $request->deposit_amount, $request->rent_start_date, $request->total_price, $request->rent_end_date);
            return redirect($payment->json()['AuthorisationLink']['Link']);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
