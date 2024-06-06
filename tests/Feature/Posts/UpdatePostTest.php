<?php

namespace Tests\Feature\Posts;

use App\Models\Log;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdatePostTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_update_post_with_wrong_id(): void
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->putJson('api/posts/29945', [], ['Authorization' => "Bearer $token"]);
        $this->assertEquals(404, $response->json()['code']);
        $response->assertJson([
            'code' => 404,
            'message' => 'Post not found',
            'data' => []
        ]);
    }
    public function test_update_post_with_no_data(): void
    {
        $user = User::factory()->create();
        $post = Post::factory([
            'media' => UploadedFile::fake()->create('photo.php', 100),
        ])->for($user)->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->putJson('api/posts/' . $post->id, [], ['Authorization' => "Bearer $token"]);
        $response->assertStatus(200);
        $this->assertCount(7, $response->json()['data']);
        $this->assertEquals('Updated successfully', $response->json()['message']);
    }
    public function test_update_post_with_data_and_save_log_for_this_post(): void
    {
        $user = User::factory()->create();
        $post = Post::factory([
            'media' => UploadedFile::fake()->create('photo.php', 100),
        ])->for($user)->create();
        $token = JWTAuth::fromUser($user);
        $update_data = [
            'title' => 'Funny Post',
        ];
        $response = $this->putJson('api/posts/' . $post->id, $update_data, ['Authorization' => "Bearer $token"]);
        $response->assertStatus(200);
        $this->assertCount(7, $response->json()['data']);
        $this->assertEquals('Funny Post', $response->json()['data']['title']);
        $this->assertEquals('Updated successfully', $response->json()['message']);
        $log = Log::query()->whereJsonContains('extra_data->id', $response->json()['data']['id'])->count();
        $this->assertEquals(1, $log);
    }
}
