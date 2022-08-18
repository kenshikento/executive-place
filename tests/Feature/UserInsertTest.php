<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserInsertTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test that migration and seeds should be running fine.
     *
     * @return void
     */
    public function test_user_can_be_created()
    {
        $this->seed();
        $this->assertDatabaseCount('users', 10);
    }
}
