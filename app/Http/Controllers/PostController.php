<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function get(){
        $posts = Posts::where('post_visibility', 'yes')->get();

        $ret = [
            "status" => true,
            "posts" => $posts
        ];
        return response($ret, 200);
    }
}
