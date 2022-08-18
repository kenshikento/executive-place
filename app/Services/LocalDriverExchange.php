<?php

namespace App\Services;

use App\Models\CurrencyConversion;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Collection;

class LocalDriverExchange implements CurrencyConvertorInterface
{
	public const CURRENCY = ['GBP', 'USD', 'EUR'];

    /**
     * works out and returns processed hourly rate
     *
     * @return void
     */
    public function getExchangeRate(string $from, string $to, int $value): int
    {
        if(!$this->currencyExists($from) OR !$this->currencyExists($to)) {
            throw new \Exception('Invalid Currency');
        }

        $data = $this->queryDummyData($from, $to);
        
        if(!$data) {
            abort(404);   
        }

        return $value * $data->rate;         
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
     * returns and checks from source currency and destination currency matches with local version
     *
     * @return CurrencyConversion
     */
    private function queryDummyData(string $from, string $to) : CurrencyConversion
    {
        return CurrencyConversion::where(['source_currency' => $from , 'destination_currency' => $to])->first();
    }
}
