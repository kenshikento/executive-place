<?php 

return [
	'driver' => [
		'service_class' => ENV('SERVICE_CLASS_DRIVER', 'App\Services\LocalDriverExchange'),
	],
	'api' => [
		'api_base_url' => ENV('CURRENCY_API_BASE_URL', 'https://api.apilayer.com/exchangerates_data/'),
		'api_token' => ENV('CURRENCY_API_TOKEN', null),
	],
];
