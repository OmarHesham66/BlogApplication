<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_logout_without_token(): void
    {
        $response = $this->postJson('api/logout');
        $response->assertStatus(401);
    }
    public function test_logout_with_token(): void
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->postJson('api/logout', [], ['Authorization' => "Bearer $token"]);
        $response->assertStatus(200);
        $this->assertGuest();
    }
}
