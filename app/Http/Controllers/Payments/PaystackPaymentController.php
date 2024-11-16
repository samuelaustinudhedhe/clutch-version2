<?php

namespace App\Http\Controllers\Payments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaystackPaymentController extends PaymentController
{

    public $SECRET_KEY;
    public $PUBLIC_KEY;
    private $CURL_HANDLE;

    /**
     * Initialize a payment transaction.
     *
     * @param array $data
     * @return array
     */
    public function initializePayment(array $data)
    {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
            'email' => $data['email'],
            'amount' => $data['amount'],
            'reference' => $data['reference'],
            'callback_url' => $data['callback_url'] ?? route('payment.paystack.callback'),
        ];

        $response = Http::withToken($this->SECRET_KEY)
            ->post($url, $fields);

        return $response->json();
    }

    /**
     * Verify a payment transaction.
     *
     * @param string $reference
     * @return array
     */
    public function verifyPayment($reference)
    {
        $url = "https://api.paystack.co/transaction/verify/$reference";

        $response = Http::withToken($this->SECRET_KEY)
            ->get($url);

        return $response->json();
    }

    /**
     * Get a list of banks for a specified country using the Paystack API.
     *
     * @param  string $country The country code (default is 'nigeria').
     * @return array|null       An array of bank information or null on API error.
     */
    public function getBanks(string $country = 'nigeria')
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->SECRET_KEY}",
            'Cache-Control' => 'no-cache',
        ])->get("https://api.paystack.co/bank", ['country' => $country]);

        $banks = $response->json()['data'];

        return $banks;
    }


    /**
     * Validate account number through Paystack API.
     *
     * @param  array $fields [
     *     'bank_code',
     *     'country_code',
     *     'account_number',
     *     'account_name',
     *     'account_type',
     *     'document_type',
     *     'document_number'
     * ]
     * @param  bool  $echo   Flag to determine whether to echo the result or return it.
     * @return void|string   If $echo is true, echoes the result; otherwise, returns the result.
     *
     * !NOTE: This endpoint costs ZAR 3 for every successful request.
     */
    public function validateAccountNumber(array $fields, bool $echo = true)
    {
        // Prepare data for the request
        $data = [
            'bank_code' => $fields['bank_code'],
            'country_code' => $fields['country_code'],
            'account_number' => $fields['account_number'],
            'account_name' => $fields['account_name'],
            'account_type' => $fields['account_type'],
            'document_type' => $fields['document_type'],
            'document_number' => $fields['document_number']
        ];

        // Return an error if required fields are empty
        if (empty($data['bank_code']) || empty($data['country_code']) || empty($data['account_number']) || empty($data['account_name']) || empty($data['account_type']) || empty($data['document_type']) || empty($data['document_number'])) {
            echo "#error: Some required fields are empty" . var_dump($data);
            exit;
        }

        // Execute the HTTP post request using Laravel's HTTP client
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->SECRET_KEY}",
            'Cache-Control' => 'no-cache',
        ])->post('https://api.paystack.co/bank/validate', $data);

        // Output or return the result based on the $echo flag
        if ($echo) {
            echo $response->body();
        } else {
            return $response->body();
        }
    }

    /**
     * Resolve account number details through Paystack API.
     *
     * @param  int    $account_number Customer's account number.
     * @param  string $bank_code      Bank code for the customer's account.
     * @return void|string            If $echo is true, echoes the result; otherwise, returns the result.
     *
     * The Resolve Account Number API takes the customer’s account number and bank code
     * and returns the account details of the customer.
     */
    public function resolveAccountNumber(int $account_number, string $bank_code)
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->SECRET_KEY}",
            'Cache-Control' => 'no-cache',
        ])->get('https://api.paystack.co/bank/resolve', ['account_number' => $account_number, 'bank_code' => $bank_code]);

        $responseData = $response->json();

        if (isset($responseData['data'])) {
            $accountDetails = $responseData['data'];
            return response()->json($accountDetails);
        } else {
            return response()->json(['error' => 'Data key not found in API response'], 500);
        }
    }

    /**
     * Process account details from a form submission.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function processAccountDetails(Request $request)
    {
        $bank_code = $request->input('bank_code');
        $account_number = $request->input('account_number');

        // Validate and resolve account details using the Paystack API
        $response = $this->resolveAccountNumber($account_number, $bank_code);

        // Output the response
        return $response;
    }

    /**
     * Handle Paystack callback
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleCallback(Request $request)
    {
        $reference = $request->reference;
        $response = $this->verifyPayment($reference);

        if ($response['status'] && $response['data']['status'] === 'success') {
            // Payment was successful
            // You might want to update your order status here
            // For now, we'll just redirect with a success message
            return redirect()->route('user.trips.index')->with('message', 'Payment successful! Your trip has been booked.');
        } else {
            // Payment failed
            return redirect()->route('user.trips.index')->with('error', 'Payment verification failed.');
        }
    }
    /**
     * Controller constructor.
     *
     * Initializes Paystack Secret Key, User instance, and cURL handle.
     */
    final function __construct()
    {
        // Paystack Secret and Public Key
        $this->SECRET_KEY = getPayStackKeys('secret');
        $this->PUBLIC_KEY = getPayStackKeys('public');

        // Curl Handle
        $this->CURL_HANDLE = curl_init();
    }
}
