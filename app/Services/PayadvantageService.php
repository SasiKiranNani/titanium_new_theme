<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PayadvantageService
{
    private $token;

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'content-type' => 'application/json',
        ])->post('https://api.test.payadvantage.com.au/v3/token', [
            'username' => config('services.payAdvantage.username'),
            'password' => config('services.payAdvantage.password'),
        ])->json();

        $this->token = $response['access_token'];
    }

    public function retrieveCustomer()
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer ' . $this->token,
        ])->get('https://api.test.payadvantage.com.au/v3/customers/');

        return $response;
    }

    public function createCustomer($driverABN, $name, $licenceNumber, $email, $DOB, $contact)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer ' . $this->token,
            'content-type' => 'application/json',
        ])->post('https://api.test.payadvantage.com.au/v3/customers', [
            'ExternalID' => $driverABN,
            'IsConsumer' => true,
            'Name' => $name,
            'FirstName' => '',
            'LastName' => '',
            'CustomRef' => $licenceNumber,
            'Email' => $email,
            'SendDirectDebitErrorEmails' => true,
            'SendPaymentReceiptEmails' => true,
            'DOB' => $DOB,
            'Phone' => $contact,
            'PhoneCountryID' => 61,
        ]);

        return $response;
    }

    public function createPayment($customerCode, $driverABN, $depositAmount, $rentStartDate, $totalAmount, $rentEndDate)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer ' . $this->token,
            'content-type' => 'application/json',
        ])->post('https://api.test.payadvantage.com.au/v3/direct_debits', [
            'Customer' => (object) [
                'Code' => $customerCode,
            ],
            'Description' => 'Test Direct Debit',
            'ExternalID' => $driverABN,
            'UpfrontAmount' => $depositAmount,
            'UpfrontDate' => $rentStartDate,
            'RecurringAmount' => $totalAmount - $depositAmount,
            'RecurringDateStart' => $rentEndDate,
            'Frequency' => 'weekly',
            'EndConditionAmount' => $totalAmount,
            'FailureOption' => 'pause',
            'ReminderDays' => 1,
            'OnchargedFees' => [],
        ]);

        return $response;
    }
}
