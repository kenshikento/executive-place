<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Services\CurrencyConvertorInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Show extends Controller
{ 
    /**
     * return user and exchange rate if there is no change then it will send back the original user info
     * @param  CurrencyConvertorInterface $currency 
     * @param  ShowUserRequest            $request  
     * @param  User                       $user     
     * @return JsonResponse                               
     */
    public function __invoke(CurrencyConvertorInterface $currency, ShowUserRequest $request, User $user): JsonResponse 
    {
        $to = $request->input('exchange_to');

        if($to === $user->currency) {
            return response()->json($user, Response::HTTP_OK); 
        }

        $currencyInfo = $currency->getExchangeRate($user->currency, $to, $user->hourly_rate);

        $result = $user->toArray();
        $result['converted_salary'] = $currencyInfo;
        $result['converted_to'] = $to;

        return response()->json($result, Response::HTTP_OK);
    }
}
