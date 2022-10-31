<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuizController;

// GET　・・・　（データを取得する基本的なもの）
// POST　・・・　（データの追加に使用）
// PUT　・・・　（データの更新に使用）
// PATCH　・・・　（ほぼPUTと同じですが、ごく一部を更新）
// DELETE　・・・　（データの削除に使用）
// OPTIONS　・・・　（使えるメソッド一覧を表示）

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
     Route::get('/', 'index')->name('index');
     Route::get('/posts/create', 'create')->name('create');
     
     Route::post('/posts', 'store')->name('store');
     Route::post('/posts/quiz', 'quizstore')->name('quizstore');
     
     Route::get('/posts/solution', 'solution')->name('solution');
     Route::get('/posts/{post}', 'quiz')->name('quiz');
     
     Route::get('/posts/{post}/edit', 'edit')->name('edit');
     Route::get('/posts/{post}/editquiz', 'quizedit')->name('quizedit');
     
     Route::post('/posts/{post}', 'update')->name('update');
     Route::post('/posts/{post}', 'quizupdate')->name('quizupdate');
     
     Route::delete('/posts/{post}', 'delete')->name('delete');
});

Route::controller(CategoryController::class)->middleware(['auth'])->group(function(){
     Route::get('/categories/{category}', 'solutionindex')->name('solutionindex');
     Route::get('/solution/categories/{category}/', 'solutioncategory')->name('solutioncategory');
});

require __DIR__.'/auth.php';