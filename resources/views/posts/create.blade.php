<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><!--投稿画面 -->
    <head>
        <meta charset="utf-8">
        <title>brewery</title>
    </head>
    <body>
        <x-app-layout>
        <x-slot name="header">
        </x-slot>
            <h1>日本酒名</h1>
            <form action="/posts" method="POST"><!--投稿する内容 -->
                @csrf
                <div class="name">
                    <h2>名前</h2>
                    <input type="text" name="post[name]" placeholder="タイトル"/>
                </div>
                <div class="area">
                    <h2>生産地</h2>
                    <textarea name="post[area]" placeholder="生産地"></textarea>
                </div>
                <div class="rice">
                    <h2>米の種類</h2>
                    <textarea name="post[rice]" placeholder="山田錦"></textarea>
                </div>
                <div class="flavor">
                    <h2>甘口/辛口</h2>
                    <textarea name="post[flavor]" placeholder="甘口/辛口"></textarea>
                </div>
                <div class="taste">
                    <h2>すっきり/まろやか</h2>
                    <textarea name="post[taste]" placeholder="すっきり/まろやか"></textarea>
                </div>
                <div class="alcholcontent">
                    <h2>度数</h2>
                    <textarea name="post[alcholcontent]" placeholder="30度"></textarea>
                </div>
                <div class="match">
                    <h2>お酒に合う料理</h2>
                    <textarea name="post[match]" placeholder="お酒に合う料理"></textarea>
                </div>
                <input type="submit" value="store"/>
            </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>
</html><!--投稿画面 -->