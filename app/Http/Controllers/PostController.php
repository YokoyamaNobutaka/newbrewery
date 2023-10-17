<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\comment;
use App\Models\like;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
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
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }//編集画面
    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }//編集画面
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }//削除
    
    // S3へのファイルアップロード
    public function uploadS3(Request $request)
    {
        // バリデーション
        $request->validate(
            [
                'file' => 'required|file',
            ]
        );

        // S3へファイルをアップロード
        $result = Storage::disk('s3')->put('/', $request->file('file'));

        // アップロードの成功判定
        if ($result) {
            return 'アップロード成功';
        }else {
            return 'アップロード失敗';
        }
    }
}
//投稿画面：保存用