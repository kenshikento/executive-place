<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserWebRouteInsertTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * testing if succesfully enters user
     *
     * @return void
     */
    public function test_user_can_be_created()
    {
        $payload = [
            'name'   => 'test',
            'email'  => 'test@test.com',
            'currency' => 'GBP',
            'hourly_rate' => 1
        ];
        
        $this->json('POST', '/user', $payload);

        $this->assertDatabaseCount('users', 1);
    }

    public function test_assert_422()
    {
        $payload = [
            'email'  => 'test@test.com',
            'currency' => 'GBP',
            'hourly_rate' => 1
        ];

        $response = $this->json('POST', '/user', $payload);

        $response->assertStatus(422);
    }
}
