<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_post_with_no_data(): void
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->postJson('api/categories', [], ['Authorization' => "Bearer $token"]);
        $response->assertJsonValidationErrors(['name', 'description']);
        $response->assertStatus(422);
    }
    public function test_create_post_with_data(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->postJson('api/categories', $category->toArray(), ['Authorization' => "Bearer $token"]);
        $response->assertJsonMissingValidationErrors(['name', 'description']);
        $this->assertDatabaseHas('categories', $category->toArray());
        $response->assertStatus(200);
    }
}
