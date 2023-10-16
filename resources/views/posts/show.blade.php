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
            <h1 class="post">
                {{ $post->name }}
            </h1>
            <div class="content">
                <div class="content__post">
                    <p class='area'>{{ $post->area }}</p>
                    <p class='rice'>{{ $post->rice }}</p>
                    <p class='flavor'>{{ $post->flavor }}</p>
                    <p class='taste'>{{ $post->taste }}</p>
                    <p class='alcholcontent'>{{ $post->alcholcontent }}</p>
                    <h3 class='match'>{{ $post->match }}</h3>   
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
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html><!--詳細画面 -->