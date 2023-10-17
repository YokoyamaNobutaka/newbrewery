<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--詳細画面 -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>brewery</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
        <x-slot name="header">
        </x-slot>
            <div class="mr-2.5 text-lg ...">
                <p class="post">
                    酒の名前:{{ $post->name }}
                </p>
            </div>
            <div class="content">
                <div class="content__post mr-2.5 ... text-lg ...">
                    <p class='area'>原産地：{{ $post->area }}</p>
                    <p class='rice'>米の種類：{{ $post->rice }}</p>
                    <p class='flavor'>辛口or甘口：{{ $post->flavor }}</p>
                    <p class='taste'>すっきりorまろやか：{{ $post->taste }}</p>
                    <p class='alcholcontent'>アルコール％：{{ $post->alcholcontent }}</p>
                    <h3 class='match'>合う料理：{{ $post->match }}</h3>   
                </div>
            </div>
            <div>
                <!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
                @if($like)
                    <!-- 「いいね」取消用ボタンを表示 -->
    	            <a href="{{ route('unlike', $post) }}" class="btn btn-success btn-sm">
    		        いいね
    		            <span class="badge">{{ $post->likes->count() }}</span><!-- 「いいね」の数を表示 -->
    	            </a>
                @else
                    <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
	                <a href="{{ route('like', $post) }}" class="btn btn-secondary btn-sm">
		            いいね
		            <span class="badge">{{ $post->likes->count() }}</span><!-- 「いいね」の数を表示 -->
	                </a>
                @endif
            </div>
           <div>
                <h1>コメント</h1><!--コメント機能-->
                @foreach ($post->comments as $comment)
                    <p>{{$comment->user->name}}</p>
                    <p>{{$comment->body}}</p>
                @endforeach
                
                <form action="/comments" method ="POST" >
                    @csrf
                    <input type="text" name="body" placeholder="コメント入力"></input>
                    <input type="hidden" name="post_id" value="{{$post->id}}"></input>
                    <button type="submit">コメントする</button>
                </form>
            </div> 
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">編集画面</a></div>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
         <script>
                function deletePost(id) {
                'use strict'
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                        }
                }
            </script>
    </body>
</html><!--詳細画面 -->