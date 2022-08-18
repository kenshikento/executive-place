<?php

namespace App\Services;

use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

class ApiDriverExchange implements CurrencyConvertorInterface
{
    public const CURRENCY = ['GBP', 'USD', 'EUR'];

    private string $baseURL;
    private string $token;
    private Client $client;

    public function __construct()
    {
        $this->baseURL = config('currency.api.api_base_url');
        $this->token = config('currency.api.api_token');
        $this->client = app()->get(Client::class);
        $this->validateSetup();
    } 

    /**
     * Loads payload and gets latest exchange rate
     *
     * @return void
     */
    public function getExchangeRate(string $from, string $to, int $value): int
    {
        if(!$this->currencyExists($from) OR !$this->currencyExists($to)) {
            throw new \Exception('Invalid Currency');
        }

        $payload = ['from' => $from, 'to' => $to, 'amount' => $value];

        return json_decode($this->getApiRates($payload, 'convert')->getBody(), true)['result'];
    }

    /**
     * checks if currency exists
     *
     * @return bool
     */
    public function currencyExists(string $currency): bool
    {
    	return in_array($currency, self::CURRENCY);
    }

    /**
     * @throws Exception
     */
    private function validateSetup(): void
    {
        if (!$this->baseURL || !$this->token) {
            throw new \Exception('Please set the config keys in .env file!');
        }
    }

    /**
     * sends get request with payload parameters and returns Response
     * @param  array  $payload  
     * @param  string $endpoint 
     * @return Response
     */
    private function getApiRates(array $payload, string $endpoint): Response
    {
        return $this->client->get($this->baseURL . $endpoint,
            [
                'query' => $payload, 
                'headers' => [
                    'apikey' => $this->token, 
                ], 
            ])
        ;
    }
}
