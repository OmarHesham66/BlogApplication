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

class ShowCategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_show_category_with_wrong_id(): void
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->getJson('api/categories/29945', ['Authorization' => "Bearer $token"]);
        $this->assertEquals(404, $response->json()['code']);
        $response->assertJson([
            'code' => 404,
            'message' => 'Category not found',
            'data' => []
        ]);
    }
    public function test_show_category_with_id(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->getJson('api/categories/' . $category->id, ['Authorization' => "Bearer $token"]);
        $response->assertStatus(200);
        $this->assertCount(2, $response->json()['data']);
        $this->assertEquals('Fetch Category Successfully', $response->json()['message']);
    }
}
