<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $this->authorize('show', $post);

        return new PostResource($post);
    }
}
