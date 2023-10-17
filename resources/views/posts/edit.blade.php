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
         <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='post_name'>
                    <h2>名前</h2>
                    <input type='text' name='post[name]' value="{{ $post->name }}">
                </div>
                <div class='area'>
                    <h2>原産地</h2>
                    <input type='text' name='post[area]' value="{{ $post->area }}">
                </div>
                <div class='rice'>
                    <h2>米の種類</h2>
                    <input type='text' name='post[rice]' value="{{ $post->rice }}">
                </div>
                <div class='flavor'>
                    <h2>甘口/辛口</h2>
                    <input type='text' name='post[flavor]' value="{{ $post->flavor }}">
                </div>
                <div class='taste'>
                    <h2>すっきり/まろやか</h2>
                    <input type='text' name='post[taste]' value="{{ $post->taste }}">
                </div>
                <div class='alcholcontent'>
                    <h2>度数</h2>
                    <input type='text' name='post[alcholcontent]' value="{{ $post->alcholcontent }}">
                </div>
                <div class='match'>
                    <h2>度数</h2>
                    <input type='text' name='post[match]' value="{{ $post->match }}">
                </div>
                <input type="submit" value="保存">
            </form>
            </div>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html><!--詳細画面 -->