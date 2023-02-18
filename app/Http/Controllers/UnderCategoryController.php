<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\UnderCategoryServiceInterface;
use Illuminate\Http\Request;

class UnderCategoryController extends Controller
{
    protected $categoryService;
    public function __construct(UnderCategoryServiceInterface $categoryService){
        $this->categoryService = $categoryService;
    }

    public function show($category, $slug){
        $underCategories = $this->categoryService->getUnderCategoryBySlug($slug);
        foreach ($underCategories as $underCategory){
            $oldPosts = $underCategory->posts->where('approved', '=', 1);
            $posts = $oldPosts->reverse();

            return view('categories.show', compact('posts'));
        }
    }
}
