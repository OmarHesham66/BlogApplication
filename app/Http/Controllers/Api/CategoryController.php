<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected CategoryRepository $categoryRepository)
    {
    }
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return response()->json([
            'message' => 'Fetch Categories Successfully',
            'code' => 200,
            'data' => CategoryResource::collection($categories),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request->validated());
        return response()->json([
            'code' => 201,
            'message' => 'Created successfully',
            'data' => CategoryResource::make($category),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return response()->json([
                'code' => 404,
                'message' => 'Category not found',
                'data' => [],
            ], 404);
        }
        return response()->json([
            'message' => 'Fetch Category Successfully',
            'code' => 200,
            'data' => CategoryResource::make($category),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return response()->json([
                'code' => 404,
                'message' => 'Category not found',
                'data' => [],
            ], 404);
        }
        $this->categoryRepository->update($id, $request->validated());
        return response()->json([
            'code' => 201,
            'message' => 'Updated successfully',
            'data' => CategoryResource::make($category->refresh()),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->categoryRepository->find($id);
        if (!$category) {
            return response()->json([
                'code' => 404,
                'message' => 'Category not found',
                'data' => [],
            ], 404);
        }
        $this->categoryRepository->delete($id);
        return response()->json([
            'code' => 200,
            'message' => 'Deleted successfully',
            'data' => [],
        ]);
    }
}
