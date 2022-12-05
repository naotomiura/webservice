<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function solutionindex(Category $category)
    {
        return view('categories.index')->with(['posts' => $category->getByCategory()]);
    }
    
    public function solutioncategory(Category $category)
    {
        return view('categories.solution')->with(['posts' => $category->getByCategory()]);
    }
    
}
