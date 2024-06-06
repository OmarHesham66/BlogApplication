<?php

namespace Tests\Feature\Posts;

use App\Models\Log;
use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Traits\UploadFile;
use Illuminate\Http\UploadedFile;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase, UploadFile;
    /**
     * A basic feature test example.
     */
    public function test_create_post_with_no_data(): void
    {
        $user = User::factory()->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->postJson('api/posts', [], ['Authorization' => "Bearer $token"]);
        $response->assertJsonValidationErrors(['title', 'content', 'media']);
        $response->assertStatus(422);
    }
    public function test_create_post_with_data_and_save_log_for_this_post(): void
    {
        $user = User::factory()->create();
        $post = Post::factory([
            'media' => UploadedFile::fake()->create('photo.php', 100),
        ])->for($user)->create();
        $token = JWTAuth::fromUser($user);
        $response = $this->postJson('api/posts', $post->toArray(), ['Authorization' => "Bearer $token"]);
        $response->assertJsonMissingValidationErrors(['title', 'content', 'media']);
        $this->assertDatabaseHas('posts', $post->toArray());
        $log = Log::query()->whereJsonContains('extra_data->id', $response->json()['data']['id'])->count();
        $this->assertEquals(1, $log);
        $response->assertStatus(200);
    }
}
