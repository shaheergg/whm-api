<?php

namespace App\Http\Controllers;


use App\Services\TypicodeService;


use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $typicodeService;


    public function __construct(TypicodeService $typicodeService)
    {
        $this->typicodeService = $typicodeService;
    }

    public function index()
    {
        try {
            $posts = $this->typicodeService->getPosts();
            return response()->json($posts);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $post = $this->typicodeService->singlePost($id);
            return response()->json($post);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
