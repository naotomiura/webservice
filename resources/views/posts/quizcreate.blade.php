<!DOCTYPE HTML>
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
	            <div class='mb-5 mt-3 posts mx-auto border col-7'>
	                <h3 class='mt-5 ml-2 mb-5'>クイズ作成</h3>
                        <form action="/posts/quiz" method="POST">
                            @csrf
                                @for($i = 1 ; $i <= 3; $i ++)
                                    <div class='post border mb-4'>
                                        <div class='quiz'>
                                                    <input value={{$postid}} type="hidden" name="post_id[]">
                                                    <h3 class='border-bottom mt-2 ml-2 mb-2 mr-2'>問題{{$i}}</h3>
                                                    <h5 class='mt-2 ml-2 mb-2'>問題文</h5>
                                                    <textarea rows="2" cols="70" class='mt-2 ml-2 mb-2' name="problem[]" required></textarea>
                                            <div class="container">
                                                <div class="row">
                                                    <input class='border border-dark col-5 mt-2 ml-4 mr-4 text-center' placeholder="選択肢1" type="text" name="choice1[]">
                                                    <input class='border border-dark col-5 mt-2 ml-4 mr-4 text-center' placeholder="選択肢2" type="text" name="choice2[]">
                                                    <input class='border border-dark col-5 mt-2 ml-4 mr-4 text-center' placeholder="選択肢3" type="text" name="choice3[]">
                                                    <input class='border border-dark col-5 mt-2 ml-4 mr-4 text-center' placeholder="選択肢4" type="text" name="choice4[]">
                                                </div>
                                            </div>
                                                    <input size="5" class='mt-2 ml-2 mb-2' placeholder="解答" type="text" name="solution[]">
                                                    <h5 class='mt-2 ml-2 mb-2'>解答説明</h5>
                                                    <textarea rows="2" cols="70" class='mt-2 ml-2 mb-2' name="explanation[]"></textarea>
                                        </div>
                                    </div>
                                @endfor
                                <input class='mt-2 ml-2 mb-2' type="submit" value="保存"/>
                            <div class="mt-2 ml-2 mb-2 back">[<a href="/">back</a>]</div>
                        </form>
                    <!--</div>-->
                </div>
                
                <!--右メニュー-->
                <div class='mt-3 mb-5 container mx-auto border col-3'>
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
