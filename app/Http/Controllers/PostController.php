<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
// Elloquant
use App\Models\Post; 
use App\Models\Category;
use App\Models\Quiz;

//DBファサード
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\QuizController;

class PostController extends Controller
{
    public function index(Post $post,Category $category)
    {
        // index bladeに取得したデータを渡す
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'categories' => $category->get()
        ]);
        
     }
     
    public function quiz(Post $post,Category $category)
    {
        return view('posts.quiz')->with([
            'quizzes' => $post->getByQuiz(),
            'categories' => $category->get(),
            'post' => $post
        ]);
    }
     
    public function solution(Post $post,Category $category)
    {
        return view('posts/solution')->with([
            'posts' => $post->getPaginateByLimit(),
            'categories' => $category->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function create(Category $category,Post $post)
    {
        return view('posts/create')->with([
            // key value   (int i = 0;)
            'categories' => $category->get(),
            'posts' => $post->get(),
            'postid' => $post->getpostid()
            ]);
            
        // $postid = Post::orderBy('created_at', 'ASC')->first()->id;
        // DB::table('posts')->orderBy('created_at', 'ASC')->first()->id;
    }

    public function store(Category $category, Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        
        // $dir = 'image';
        // $file_name = $request->file('image');
        // $input->file('image')->store('public/' . $dir, $file_name);
        
        // quizcreateビューに遷移　$postidも遷移
        
        return view('/posts/quizcreate')->with([
            // key value   (int i = 0;)
            'categories' => $category->get(),
            'posts' => $post->get(),
            'postid' => $post->id
            ]);
    }
    
    public function quizstore(Quiz $quiz, QuizRequest $request) // 引数をRequestからPostRequestにする
    {
        // 複数レコード保存
        $input = $request['quiz'];
        Quiz::insert($input); // Eloquentでの方法
        return redirect('/posts/' . $quiz->post_id);
    }
    
    
    public function edit(Post $post,Category $category)
    {
        return view('posts/edit')->with([
            'post' => $post,
            'categories' => $category->get(),
            'quizzes' => $post->getByQuiz()
        ]);
    }
    
    public function quizedit(Post $post,Category $category)
    {
        return view('posts/quizedit')->with([
            'post' => $post,
            'categories' => $category->get(),
            'quizzes' => $post->getByQuiz()
        ]);
    }
    
    public function update(PostRequest $request, Post $post,Quiz $quiz)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function quizupdate(PostRequest $request, Post $post,Quiz $quiz)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
