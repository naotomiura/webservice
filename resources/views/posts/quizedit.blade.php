<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
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
	                <h3 class='mt-5 ml-2 mb-5'>クイズ編集</h3>
                
                    <div class='mb-5 posts mx-auto border col-12'>
                        <!--<h1>クイズ作成</h1>-->
                        <form action="/posts" method="POST">
                            @csrf
                            @method('PUT')
                                    <h5 class='mt-2 ml-2 mb-2'>タイトル</h5>
                                    <textarea rows="2" cols="70" class='mt-2 ml-2 mb-2' name="post[title]">{{ $post->title }}</textarea>
                                    <input class='mt-2 ml-2 mb-2' type="file" name="post[image]" placeholder="image追加" value="{{ old('post.image') }}"/>
                                    
                                    <select name="post[category_id]">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                    <input type="hidden" name="post[]">
                            
                            <div class="quiz mt-2">
                                
                                    @foreach ($quizzes as $quiz)
                                        <div class='post border mb-4'>
                                            <div class='quiz'>
                                                        <h3 class='border-bottom mt-2 ml-2 mb-2 mr-2'>問題{{$quiz->id}}</h3>
                                                        <h5 class='mt-2 ml-2 mb-2'>問題文</h5>
                                                        <textarea rows="2" cols="70" class='mt-2 ml-2 mb-2' name="quiz[problem]" required>{{ $quiz->problem }}</textarea>
                                                <div class="container">
	                                                <div class="row">
                                                        <input value="{{ $quiz->choice1 }}" class='border border-dark col-5 mt-2 ml-4 mr-4 text-center' type="text" name="quiz[choice1]">
                                                        <input value="{{ $quiz->choice2 }}" class='border border-dark col-5 mt-2 ml-4 mr-4 text-center' type="text" name="quiz[choice2]">
                                                        <input value="{{ $quiz->choice3 }}" class='border border-dark col-5 mt-2 ml-4 mr-4 text-center' type="text" name="quiz[choice3]">
                                                        <input value="{{ $quiz->choice4 }}" class='border border-dark col-5 mt-2 ml-4 mr-4 text-center' type="text" name="quiz[choice4]">
                                                    </div>
                                                </div>
                                                        <input value="{{ $quiz->solution }}" size="5" class='mt-2 ml-2 mb-2' placeholder="解答" type="text" name="quiz[solution]">
                                                        <h5 class='mt-2 ml-2 mb-2'>解答説明</h5>
                                                        <textarea rows="2" cols="70" class='mt-2 ml-2 mb-2' name="quiz[explanation]">{{ $quiz->explanation}}</textarea>
                                                        <input type="hidden" name="quiz[]">
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                            
                            <!--type属性をsubmitと指定することで、このinputタグが追加されているForm領域の送信を実行-->
                            <input class='mt-2 ml-2 mb-2' type="submit" value="保存"/>
                            <div class="mt-2 ml-2 mb-2 back">[<a href="/">back</a>]</div>
                        </form>
                    </div>
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