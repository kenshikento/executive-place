<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserShowEndPointTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Testing if success message comes out once they converted through endpoint.
     *
     * @return void
     */
    public function test_asserts_if_user_can_be_found_with_converted_currency_sucess()
    {
        $this->seed();

        $id = User::inRandomOrder()->first()->id;
        $response = $this->json('GET',  '/api/user/' . $id . '/currency?exchange_to=GBP');
        $response->assertStatus(200);
    }

    public function test_asserts_if_param_are_not_filled_validation_error()
    {
        $this->seed();

        $id = User::inRandomOrder()->first()->id;
        $response = $this->json('GET',  '/api/user/' . $id . '/currency');
        $response->assertStatus(422);
    }

    public function test_assert_non_exist_user_404()
    {
        $id = 1;
        $response = $this->json('GET',  '/api/user/' . $id . '/currency');
        $response->assertStatus(404);   
    }

    public function test_assert_same_exchange_rate_200()
    {
        $this->seed();

        $user = User::inRandomOrder()->first();
        $id = $user->id;
        $exchange = $user->currency;

        $response = $this->json('GET',  '/api/user/' . $id . '/currency?exchange_to='. $exchange);
        $response->assertStatus(200);   
    }    
}
