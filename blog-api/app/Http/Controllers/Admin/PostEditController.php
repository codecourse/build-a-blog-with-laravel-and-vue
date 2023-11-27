<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostEditResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostEditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function __invoke(Post $post)
    {
        return new PostEditResource($post);
    }
}
