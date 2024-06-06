<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_login_if_no_data_send(): void
    {
        $response = $this->postJson('/api/login', []);
        $response->assertJsonValidationErrors(['email', 'password']);
        $response->assertStatus(422);
    }
    public function test_login_unauthenticated_user(): void
    {
        $data = ['email' => 'test@example.com', 'password' => '123465'];
        $response = $this->postJson('/api/login', $data);
        $response->assertUnauthorized();
        $response->assertStatus(401);
    }
    public function test_login_authenticated_user(): void
    {
        $user = User::factory()->create();
        $credentials = [
            'email' => $user->email,
            'password' => 'password'
        ];
        $response = $this->postJson('/api/login', $credentials);
        $response->assertJsonMissingValidationErrors();
        $response->assertStatus(200);
    }
}
