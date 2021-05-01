<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFindUser()
    {
        $response = $this->get('/api/users/1');

        $response->assertStatus(200);
    }

    public function testNonExistingUser()
    {
        $response = $this->get('/api/users/-1');

        $response->assertStatus(404);
    }
}
