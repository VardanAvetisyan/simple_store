<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderTest extends TestCase
{

    public function testCheckout()
    {
        $response = $this->post(route('checkout.send', [], false), [
            'name' => 'Test',
            'email' => 'test@test.com',
            'address' => 'Indonesia',
            'card_number' => '4242424242424242',
            'month' => '5',
            'year' => 2019,
            'cvv' => 123
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('home'));

        $response->assertStatus(302);

    }
}
