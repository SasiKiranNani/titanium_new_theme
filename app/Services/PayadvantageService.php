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
            'authorization' => 'Bearer '.$this->token,
        ])->get('https://api.test.payadvantage.com.au/v3/customers/');

        return $response;
    }

    public function createCustomer()
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer '.$this->token,
            'content-type' => 'application/json',
        ])->post('https://api.test.payadvantage.com.au/v3/customers', [
            'ExternalID' => '123456',
            'IsConsumer' => true,
            'Name' => 'Harpreet Singh',
            'FirstName' => 'Harpreet',
            'LastName' => 'Singh',
            'CustomRef' => '13351',
            'Email' => 'jfsldl@fkkds.cksjk',
            'SendDirectDebitErrorEmails' => true,
            'SendPaymentReceiptEmails' => true,
            'DOB' => today()->subYears(30)->format('Y-m-d'),
            'Phone' => '0234567890',
            'PhoneCountryID' => 61,
        ]);

        return $response;
    }

    public function createPayment()
    {
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authorization' => 'Bearer '.$this->token,
            'content-type' => 'application/json',
        ])->post('https://api.test.payadvantage.com.au/v3/direct_debits', [
            'Customer' => (object) [
                'Code' => 'BJ9MSA',
            ],
            'Description' => 'Test Direct Debit',
            'ExternalID' => '123456',
            'UpfrontAmount' => 100.00,
            'UpfrontDate' => today()->format('Y-m-d'),
            'RecurringAmount' => 50.00,
            'RecurringDateStart' => today()->addMonth()->format('Y-m-d'),
            'Frequency' => 'weekly',
            'EndConditionAmount' => 500.00,
            'FailureOption' => 'pause',
            'ReminderDays' => 1,
            'OnchargedFees' => [],
        ]);

        return $response;
    }
}
