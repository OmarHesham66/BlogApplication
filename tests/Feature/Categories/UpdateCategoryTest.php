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

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_update_category_with_wrong_id(): void
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->putJson('api/categories/29945', [], ['Authorization' => "Bearer $token"]);
        $this->assertEquals(404, $response->json()['code']);
        $response->assertJson([
            'code' => 404,
            'message' => 'Category not found',
            'data' => []
        ]);
    }
    public function test_update_category_with_no_data(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->putJson('api/categories/' . $category->id, [], ['Authorization' => "Bearer $token"]);
        $response->assertStatus(200);
        $this->assertCount(2, $response->json()['data']);
        $this->assertEquals('Updated successfully', $response->json()['message']);
    }
    public function test_update_category_with_data(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $token = JWTAuth::fromUser($user);
        $update_data = [
            'name' => 'Important Category',
        ];
        $response = $this->putJson('api/categories/' . $category->id, $update_data, ['Authorization' => "Bearer $token"]);
        $response->assertStatus(200);
        $this->assertCount(2, $response->json()['data']);
        $this->assertEquals('Important Category', $response->json()['data']['name']);
        $this->assertEquals('Updated successfully', $response->json()['message']);
    }
}
