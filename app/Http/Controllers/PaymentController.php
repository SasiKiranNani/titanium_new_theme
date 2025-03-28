<?php

namespace App\Http\Controllers;

use App\Services\PayadvantageService;

class PaymentController extends Controller
{
    public $customerCode = null;
    public function initiate(PayadvantageService $payadvantageService)
    {
        $customerResponse = $payadvantageService->retrieveCustomer();
        $customerRecords = $customerResponse->json()['Records'];
        foreach ($customerRecords as $customer) {
            if ($customer['Email'] === 'jfsldl@fkkds.cksjk') {
                $this->customerCode = $customer['Code'];
                break;
            }
        }
        if ($this->customerCode === null) {
            $customer = $payadvantageService->createCustomer();
            $this->customerCode = $customer->json()['Code'];
        }

        if ($this->customerCode !== null) {
            $payment = $payadvantageService->createPayment($this->customerCode);
            return response()->json($payment->json());
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
