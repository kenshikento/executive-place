<?php

namespace App\Services;

use Carbon\Carbon; 

interface CurrencyConvertorInterface
{
	public function getExchangeRate(string $from, string $to, int $value): int;
	public function currencyExists(string $currency): bool;
}