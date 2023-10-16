<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\comment;
use App\Models\like;
use App\Models\User;
/*ModelsのPostというモデルを使用*/

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->get()]);  
    //一覧スタート画面：blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    public function show(Post $post ,Comment $comments)
    {
        $like=like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();
        return view('posts.show',compact('post', 'like'))->with(['post' => $post],['comment' => $comments]);
    //詳細画面：'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function create()
    {
        return view('posts.create');
    //投稿画面：posts.create create.blade.phpを表示
    }
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
}
//投稿画面：保存用