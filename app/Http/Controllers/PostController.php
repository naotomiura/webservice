<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
// Elloquant
use App\Models\Post; 
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Answer;

//DBファサード
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\QuizController;

// クラウド上に画像を保存
use Cloudinary; 
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function adminindex(Post $post,Category $category)
    {
        $user = Auth::id();
        $average = Answer::selectRaw('AVG(correct) as average')
        ->groupBy('user_id')
        ->where('user_id', $user )
        ->get();
        
        // dd($average);
         
        $ranking = Answer::select('user_id')
        ->selectRaw('AVG(correct) as average')
        ->groupBy('user_id')
        ->orderBy('average', 'DESC')
        ->get();
        
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'categories' => $category->get(),
            'ranking'=> $ranking,
            'average'=> $average
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

    public function create(Category $category,Post $post)
    {
        $postid = Post::orderBy('created_at', 'DESC')->first()->id;
        // dd(Post::orderBy('created_at', 'DESC')->first());
        
        return view('posts/create')->with([
            // key value   (int i = 0;)
            'categories' => $category->get(),
            'posts' => $post->get(),
            'postid' => $postid
            ]);
        // DB::table('posts')->orderBy('created_at', 'ASC')->first()->id;
    }

    public function store(Post $post,Request $request,Category $category) // 引数をRequestからPostRequestにする
    {
        // dd($request);
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        
        // publicに取得したファイル名で保存
        // $ext = $request->file('image')->getClientOriginalExtension();
        // $file_name = 'image'.$request->id.'.'.$ext;
        // $request->file('image')->storeAs('public/' . 'images/', $file_name);
        // $post->image = 'storage/' . 'images' . '/' . $file_name;
        
        $post->image = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        
        $post->category_id = $request->category_id;
        $post->save();
        
        return view('/posts/quizcreate')->with([
            // key value   (int i = 0;)
            'categories' => $category->get(),
            'posts' => $post->get(),
            'postid' => $post->id
            ]);
    }
    
    public function quizstore(Request $request) // 引数をRequestからPostRequestにする
    {
        // dd($request);
        for($i = 0 ; $i <= 2; $i ++){
            $quiz = new Quiz;
            $quiz->post_id = $request->post_id[$i];
            $quiz->problem = $request->problem[$i];
            $quiz->choice1 = $request->choice1[$i];
            $quiz->choice2 = $request->choice2[$i];
            $quiz->choice3 = $request->choice3[$i];
            $quiz->choice4 = $request->choice4[$i];
            $quiz->solution = $request->solution[$i];
            $quiz->explanation = $request->explanation[$i];
            $quiz->save();
        }
        
        return redirect('/posts/' . $request->post_id[1]);
    }
    
    
    public function answerstore(Request $request,Category $category,Quiz $quiz) // 引数をRequestからPostRequestにする
    {
        // dd($request);
        $count = 0;
        for($i = 0 ; $i <= 2; $i ++){
            $answer = new Answer;
            $answer->user_id = $request->user_id[$i];
            
            // quiz_idにsolutiion入れてます
            $answer->quiz_id = $request->quiz_id[$i];
            $answer->useranswer = $request->useranswer[$i];
            $answer->timestamps = false; //追加
            $answer->save();
            
            $solution = Quiz::find($request->quiz_id[$i])->solution;
            // dd($solution);
            
            if($request->useranswer[$i] == $solution){
                $count  += 1;
                $answer->correct = 1;
            }
            else{
                $answer->correct = 0;
            }
        }
        
        return view('posts/answer')->with([
            'count' => $count,
            'categories' => $category->get(),
            // 'quizzes' => $post->getByQuiz()
        ]);
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
    
    public function update(Request $request, Post $post,Quiz $quiz,Category $category)
    {
        // dd($request);
        $input_post = $request['post'];
        $post->fill($input_post)->save();
    
        // quizeditに遷移 .
        return view('posts/quizedit')->with([
            'post' => $post,
            'categories' => $category->get(),
            'quizzes' => $post->getByQuiz()
        ]);
    }
    
    public function quizupdate(Request $request, Post $post,Quiz $quiz)
    {
        // dd($request);
        $input_quiz = $request['quiz'];
        $post->fill($input_quiz)->save();
    
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function portfolio()
    {
        return view('/portfolio/home');
    }
}
