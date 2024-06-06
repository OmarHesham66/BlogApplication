<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Traits\UploadFile;
use App\Http\Requests\PostRequest;
use App\Repositories\LogRepository;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected PostRepository $postRepository, protected LogRepository $logRepository)
    {
        // $this->postRepository = $postRepository;
    }
    public function index()
    {
        $posts = PostResource::collection($this->postRepository->all(['user']));
        return response()->json([
            'code' => 200,
            'message' => 'Fetch Posts Successfully',
            'data' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['author'] = auth()->id();
        $data['media'] = $this->UploadFile($request->file('media'), 'PostsMedia');
        $post = PostResource::make($this->postRepository->create($data));
        $this->save_log('creation', $post->id, $data['author']);
        return response()->json([
            'code' => 201,
            'message' => 'Created successfully',
            'data' => $post,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return response()->json(
                [
                    'code' => 404,
                    'message' => 'Post not found',
                    'data' => []
                ]
            );
        }
        return response()->json([
            'code' => 200,
            'message' => 'Fetch Post Successfully',
            'data' => PostResource::make($post),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $data = $request->validated();
        $data['author'] = auth()->id();
        $post = $this->postRepository->find($id);
        if (!$post) {
            return response()->json(
                [
                    'code' => 404,
                    'message' => 'Post not found',
                    'data' => []
                ]
            );
        }
        $this->postRepository->update($id, $data);
        $this->update_file($request, $post->media, 'PostsMedia');
        $this->save_log('modification', $id, $data['author']);
        $post = PostResource::make($post->fresh());
        return response()->json([
            'code' => 201,
            'message' => 'Updated successfully',
            'data' => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = $this->postRepository->find($id);
        if (!$post) {
            return response()->json(
                [
                    'code' => 404,
                    'message' => 'Post not found',
                    'data' => []
                ]
            );
        }
        Storage::delete($this->postRepository->find($id)->media);
        $this->postRepository->delete($id);
        $this->save_log('deletion', $post, auth()->id());
        return response()->json([
            'code' => 200,
            'message' => 'Deleted successfully'
        ]);
    }
    public function save_log($action, $data, $user_id)
    {
        $data = ($data instanceof Post) ? $data : $this->postRepository->find($data);
        return $this->logRepository->create(
            [
                'user_id' => $user_id,
                'operation' => $action,
                'table_name' => 'posts',
                'extra_data' => json_encode($data),
            ]
        );
    }
}
