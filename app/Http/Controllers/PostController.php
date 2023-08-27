<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPostsWithAccount()
    {
        $posts = Post::has('account')->get();
        return response()->json($posts);
    }


    public function show(Post $post) {
        return view('post')->withPost($post);
    }

    public function attach(Post $post, Tag $tag) {
        if (!$post->tags->contains($tag)) {
            $post->tags()->attach($tag);
            $post->refresh();
            return view('post', ['post' => $post]);
        } else {
            return response()->json(['message' => 'Tag già attaccato al post.']);
        }
    }

    public function detach(Post $post, Tag $tag) {
        if ($post->tags->contains($tag)) {
            $post->tags()->detach($tag);
            $post->refresh();
            return view('post', ['post' => $post]);
        } else {
            return response()->json(['message' => 'Il tag non è attaccato al post.']);
        }
    }
}
