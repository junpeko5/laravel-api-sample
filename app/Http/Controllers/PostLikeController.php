<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use App\Topic;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Request $request, Topic $topic, Post $post)
    {
        // 自身のいいね以外である必要がある
        $this->authorize('like', $post);
        // いいねしている場合は終了
        if ($request->user()->hasLikedPost($post)) {
            return response(null, 409);
        }
        $like = new Like();
        $like->user()->associate($request->user());
        $post->likes()->save($like);
        return response(null, 204);
    }

    public function destroy(Request $request, Topic $topic, Post $post)
    {
        // 自身のいいね以外である必要がある
        $this->authorize('like', $post);
        // まだ いいねしていない場合は終了
        if (!$request->user()->hasLikedPost($post)) {
            return response(null, 409);
        }
        $like = new Like();
        $like->user()->associate($request->user());
        $post->likes()->delete();
        return response(null, 204);
    }
}
