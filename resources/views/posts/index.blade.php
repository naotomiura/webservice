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
	            
                <div class='posts mx-auto border col-7'>
                    <h3 class="mt-5 mb-5">新着記事</h3>
                    <input type="file" name="image">
                    @foreach ($posts as $post) 
                        <div class='post border mb-4'>
                            <div class="container">
    	                        <div class="row">
                                    <div class='col-6'>
                                        <img src="/images/{{ $post->image }}.jpg" width="300" height="200">
                                    </div>
                                    <div class='col-6'>
                                        <h4 class='title border-bottom'><a href="/posts/{{ $post->id }}"> {{ $post->title }} </a></h4>
                                        <h6 class='title border-bottom'>{{ $post->subtitle }} </a></h6>
                                        <!--$postsのcategory-->
                                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }} </a>

                                        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
                                        
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
                    <div class='paginate col-6'>
                        {{ $posts->links() }}
                    </div>
                </div>
                
                <!--右メニュー-->
                <div class='container mx-auto border col-3'>
                    <div class='categorylist mt-2 mb-2'>
                        <div class="border-bottom mb-2">カテゴリ</div>
                        @foreach ($categories as $category)
                        <p><a href="/categories/{{ $category->id }}">{{ $category->name }} </a></p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        
        
        <script>
            function deletePost(id) {
                'use strict'
        
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        <!-- Bootstrap Javascript -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>