<?php

namespace Tests\Feature\Posts;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowPostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_show_post_with_wrong_id(): void
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->getJson('api/posts/29945', ['Authorization' => "Bearer $token"]);
        $this->assertEquals(404, $response->json()['code']);
        $response->assertJson([
            'code' => 404,
            'message' => 'Post not found',
            'data' => []
        ]);
    }
    public function test_show_post_with_id(): void
    {
        $user = User::factory()->create();
        $post = Post::factory([
            'media' => UploadedFile::fake()->create('photo.php', 100),
        ])->for($user)->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->getJson('api/posts/' . $post->id, ['Authorization' => "Bearer $token"]);
        $response->assertStatus(200);
        $this->assertCount(7, $response->json()['data']);
        $this->assertEquals('Fetch Post Successfully', $response->json()['message']);
    }
}
