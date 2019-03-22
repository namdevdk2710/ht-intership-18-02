<?php

namespace App\Repositories\V1\Post;

use App\Repositories\BaseRepository;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getModel()
    {
        return Post::class;
    }

    public function index()
    {
        return $this->model->orderBy('id', 'asc')->paginate(5);
    }

    public function store($request)
    {
        if ($request['image_url'] != null) {
            $file = $request['image_url'];
            $forder = 'uploads/images';
            $name = $file->getClientOriginalName();
            $imageUrl = str_random(5).'_'.$name;
            while (file_exists($forder.$imageUrl)) {
                $imageUrl= str_random(5).'_'.$name;
            }
            $file->move($forder, $imageUrl);

            $this->model->create([
                'title' => $request['title'],
                'content' => $request['content'],
                'user_id' => Auth::id(),
                'image_url' => $imageUrl,
            ]);
        } else {
            $this->model->create([
                'title' => $request['title'],
                'content' => $request['content'],
                'user_id' => Auth::id(),
            ]);
        }
        return $this;
    }

    public function update($id, $request)
    {
        $post = $this->model->find($id);

        if ($request['image_url']) {
            $file = $request['image_url'];
            $forder = 'uploads/images/';
            $name = $file->getClientOriginalName();
            $imageUrl = str_random(5).'_'.$name;
            while (file_exists($forder.$imageUrl)) {
                $imageUrl= str_random(5).'_'.$name;
            }
            $file->move($forder, $imageUrl);
        } else {
            $imageUrl = $post->image_url;
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image_url = $imageUrl;

        return $post->save();
    }

    public function destroy($id)
    {
        $post = $this->model->find($id);
        $nameImageOld = 'uploads/images/' . $post->image_url;
        if (file_exists(public_path($nameImageOld))) {
            unlink(public_path($nameImageOld));
        }

        return $post->delete();
    }
}
