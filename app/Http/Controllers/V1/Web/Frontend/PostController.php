<?php

namespace App\Http\Controllers\V1\Web\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Post\PostRepositoryInterFace;
use App\Repositories\V1\City\CityRepositoryInterFace;

class PostController extends Controller
{
    protected $postRepository;
    protected $cityRepository;

    public function __construct(PostRepositoryInterFace $postRepository, CityRepositoryInterFace $cityRepository)
    {
        $this->postRepository = $postRepository;
        $this->cityRepository = $cityRepository;

    }

    public function index()
    {
        $posts = $this->postRepository->index();
        $cities = $this->cityRepository->getCity();


        return view('frontend.posts.index', compact('posts', 'cities')) ;
    }

    public function detail($id)
    {
        $posts = $this->postRepository->index();
        $post = $this->postRepository->find($id);

        return view('frontend.posts.detail', compact('post', 'posts')) ;
    }
}
