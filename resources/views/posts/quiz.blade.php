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
                    <h3 class="mt-5 mb-5">{{ $post->title }}</h3>
                    <img class="mt-5 mb-5" src="/images/{{ $post->image }}.jpg" width="600" height="400">
                    @foreach ($quizzes as $quiz) 
                        <div class='post border mb-4'>
                            <div class='quiz'>
                                <h3 class='border-bottom mt-2 mb-2 ml-4 mr-4'> 問題{{$quiz->id}}</h3>
                                <h3 class='mb-5 ml-4 mr-4'>{{ $quiz->problem }}</h3>
                                <div class="container">
                                    <div class="row">
                                        <h5 class='border border-dark col-5 ml-4 mr-4 text-center'> 1:{{$quiz->choice1 }} </h5>
                                        <h5 class='border border-dark col-5 ml-4 mr-4 text-center'> 2:{{$quiz->choice2 }} </h5>
                                        <h5 class='border border-dark col-5 ml-4 mr-4 text-center'> 3:{{$quiz->choice3 }} </h5>
                                        <h5 class='border border-dark col-5 ml-4 mr-4 text-center'> 4:{{$quiz->choice4 }} </h5>
                                    </div>
                                </div>
                                <h5 class='border-bottom mt-5 ml-4 mr-4'> 解答：{{ $quiz->solution }} </h5>
                                <h5 class='ml-4 mr-4'> {{ $quiz->explanation }} </h5>
                            </div>
                        </div>
                    @endforeach
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
    </body>
</html>