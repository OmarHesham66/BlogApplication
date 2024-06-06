<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_register_if_no_data_send(): void
    {
        $response = $this->postJson('/api/register');
        $response->assertJsonValidationErrors(['name', 'email', 'password', 'password_confirmation']);
        $response->assertStatus(422);
    }
    public function test_register_with_data(): void
    {
        $data = [
            'name' => 'omar',
            'email' => 'test@example.com',
            'password' => '123456789',
            'password_confirmation' => '123456789'
        ];
        $response = $this->postJson('/api/register', $data);
        $this->assertDatabaseHas('users', $response->json()['user']);
        $response->assertStatus(200);
    }
}
