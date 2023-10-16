<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comment;
use App\Models\User;
use App\Models\Post;
use App\Models\like;


class LikeController extends Controller
{
    public function like(Post $post,Request $request){
        $like=New like();
        $like->post_id=$post->id;
        $like->user_id=Auth::user()->id;
        $like->save();
        return back();
    }//いいね機能
    
    public function unlike(Post $post, Request $request){
        $user=Auth::user()->id;
        $like=Like::where('post_id', $post->id)->where('user_id', $user)->first();
        $like->delete();
        return back();
    }//いいねを消す機能
}
