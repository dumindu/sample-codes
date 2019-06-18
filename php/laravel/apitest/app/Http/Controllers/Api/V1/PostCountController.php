<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class PostCountController extends Controller
{
    protected $post;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    public function index(Request $request)
    {
        $tags = $request->input('tags');
        if ($tags) {
            return $this->post->getPostCountByTagNames($tags);
        }

        return $this->post->getAllPostCount();
    }
}
