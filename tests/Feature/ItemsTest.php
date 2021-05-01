<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAllItems()
    {
        $response = $this->get('/api/item?query=hero&category=Books&priceRange=100&review=4');

        $response->assertStatus(200);
    }

    public function testInvalidCategory()
    {
        $response = $this->get('/api/item?category=ThisCatDoesNotExist');

        $response->assertStatus(200);
    }

    public function testItemByID()
    {
        $response = $this->get('/api/item/1');

        $response->assertStatus(200);
    }

    public function testItemByNonExistingID()
    {
        $response = $this->get('/api/item/-1');

        $response->assertStatus(404);
    }
}
