<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>わくわくエンジニア</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Zen Kaku Gothic New', sans-serif;
            }
        </style>
    </head>
    
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/">わくわくエンジニア</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/posts/solution">クイズを解く</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">クイズを編集する</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts/create">クイズを作る</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <div class="container">
	        <div class="row">
	            <!--問題-->
                <div class='posts mx-auto border col-7'>
                    <h3 class="mt-5 mb-5">新着記事</h3>
                    
                    <div class='border mb-4'>
                        <h4>ユーザー名：{{ Auth::user()->name }}</h4>
                        <h4>正答率：{{$average}}</h4>
                        <h4>ランキング：{{$ranking}}</h4>
                    </div>
                    
                    @foreach ($posts as $post) 
                        <div class='post border mb-4'>
                            <div class="container">
    	                        <div class="row">
                                    <div class='col-6'>
                                        <img src="{{ asset($post->image) }}" width="300" height="200">
                                    </div>
                                    <div class='col-6'>
                                        <h4 class='title border-bottom'><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                                        <!--$postsのcategory-->
                                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>

                                        <form action="/posts/{{ $post->id }}/edit">
                                            @csrf
                                            <button class='col-4' type="button">edit</button> 
                                        </form>
                                        
                                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class='col-4' type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>
