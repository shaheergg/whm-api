<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class TypicodeService
{
    protected $base_url;


    public function __construct()
    {
        $this->base_url = 'https://jsonplaceholder.typicode.com';
    }


    /**
     * Get all posts
     *
     * @return array
     */

    public function getPosts()
    {
        $response = Http::get("{$this->base_url}/posts");

        if ($response->successful()) {
            return $response->json();
        }
        throw new \Exception('Failed to get posts');
    }


    public function singlePost($id)
    {
        $response = Http::get("{$this->base_url}/posts/{$id}");

        if ($response->successful()) {
            return $response->json();
        }
        throw new \Exception('Failed to get post number ' . $id);
    }
}
