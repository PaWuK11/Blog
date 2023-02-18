<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\UnderCategory;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\UnderCategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    protected $category;

    protected $underCategoryService;

    public function __construct(CategoryServiceInterface $category, UnderCategoryServiceInterface $underCategoryService)
    {
        $this->category = $category;
        $this->underCategoryService = $underCategoryService;
    }

    public function index()
    {
        $categories = $this->category->getCategories();

        return view('categories.all', compact('categories'));
    }

    public function create()
    {
        $categories = $this->category->getCategories();

        return view('categories.create', compact('categories'));
    }


    public function store(CategoryStoreRequest $request)
    {
        if($request->input('category_id')){
            $this->underCategoryService->create($request);

            return redirect()->back()->with('success', $request->title . ' successfully added!');
        }
        $this->category->saveCategory($request);

        return redirect()->back()->with('success', $request->title . ' successfully added!');
    }

    public function underCategoryStore(Request $request){

    }

    public function show($slug)
    {
        $categories = $this->category->getCategoriesBySlug($slug);
        foreach ($categories as $category){
            $oldPosts = $category->posts->where('approved', '=', 1);
            $posts = $oldPosts->reverse();

            return view('categories.show', compact('posts'));
        }
    }
}
