<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Post\PostRepositoryInterFace;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterFace $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->index();

        return view('frontend.posts.index', compact('posts')) ;
    }

    public function detail($id)
    {
        $posts = $this->postRepository->index();
        $post = $this->postRepository->find($id);

        return view('frontend.posts.detail', compact('post','posts')) ;
    }
}
