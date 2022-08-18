<?php

namespace Database\Seeders;

use App\Models\CurrencyConversion;
use Illuminate\Database\Seeder;

class CurrencyConversionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $array = json_decode(file_get_contents(storage_path() . "/currency.json"), true);

        foreach($array as $currency){
            CurrencyConversion::create([
                'source_currency' => $currency['from'],
                'destination_currency' => $currency['to'],
                'rate' => $currency['rate'],
            ]);
        }
    }
}
