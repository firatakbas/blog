<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Services\BlogService;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blog = $this->blogService->all();

        return response()->json([
            'data' => $blog,
        ]);
    }

    public function store(StoreBlogRequest $request)
    {
        $this->blogService->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Blog başarıyla eklendi.',
        ]);
    }

    public function show(int $id)
    {
        $blog = $this->blogService->getById($id);

        return response()->json([
            'success' => true,
            'data'    => $blog,
        ]);
    }

    public function update(UpdateBlogRequest $request, int $id)
    {
        $this->blogService->update($id, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Güncelleme işlemi başarılı',
        ]);
    }

    public function destroy(int $id)
    {
        $this->blogService->delete($id);

        return response()->json([
            'success' => true,
            'message' => "Silme işlemi başarılı",
        ]);
    }
}
