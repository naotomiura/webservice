<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'post_id',
    'problem',
    'choice1',
    'choice2',
    'choice3',
    'choice4',
    'solution',
    'explanation'
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
