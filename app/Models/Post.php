<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
    'title',
    'subtitle',
    'image',
    'category_id'
    ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getpostid()
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('created_at', 'ASC')->first();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function quizzes()
    {
        return $this->hasMany(Quiz::class);  
    }
    
    public function getByQuiz(int $limit_count = 10)
    {
        // postが持つquiz
         return $this->quizzes()->with('post')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}
