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
        $customerName = explode(' ', $name, 2);
        $firstName = $customerName[0];
        $lastName = $customerName[1] ?? null;
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer ' . $this->token,
            'content-type' => 'application/json',
        ])->post('https://api.test.payadvantage.com.au/v3/customers', [
            'ExternalID' => $driverABN,
            'IsConsumer' => true,
            'Name' => $name,
            'FirstName' => $firstName,
            'LastName' => $lastName,
            'CustomRef' => $licenceNumber,
            'Email' => $email,
            'SendDirectDebitErrorEmails' => true,
            'SendPaymentReceiptEmails' => true,
            'DOB' => $DOB,
            'Mobile' => str_starts_with($contact, '0') ? $contact : '0' . $contact,
            'MobileCountryID' => 61,
        ]);

        return $response;
    }

    public function createPayment($customerCode, $driverABN, $costPerWeek, $rentEndDate)
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
            'RecurringAmount' => $costPerWeek,
            'RecurringDateStart' => $rentEndDate,
            'Frequency' => 'weekly',
            'EndConditionAmount' => null,
            'FailureOption' => 'pause',
            'ReminderDays' => 3,
            'OnchargedFees' => [],
        ]);

        return $response;
    }
}
