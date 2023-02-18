<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\Tag;
use App\Services\Interfaces\CategoryServiceInterface;
use App\Services\Interfaces\PostServiceInterface;
use App\Services\Interfaces\TagServiceInterface;
use App\Services\Interfaces\UnderCategoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $postService;
    protected $tagService;
    protected $categoryService;
    protected $underCategoryService;

    public function __construct(PostServiceInterface $postService, TagServiceInterface $tagService, CategoryServiceInterface $categoryService, UnderCategoryServiceInterface $underCategoryService)
    {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->categoryService = $categoryService;
        $this->underCategoryService = $underCategoryService;
    }

    public function create()
    {
        $tags = $this->tagService->getTags();
        $categories = $this->categoryService->getCategories();
        $underCategories = $this->underCategoryService->getAll();

        return view('createpost', compact('tags', 'categories', 'underCategories'));
    }

    public function store(PostStoreRequest $request)
    {
        $this->postService->savePostData($request);

        return redirect()->back()->with('success', 'Successfully created! It will be published after approving by admin.');
    }

    public function __invoke(PostStoreRequest $request) {
        $data = $request->validate();
        $data['image'] = Storage::put('/images', $data['image']);
        Post::firstOrCreate($data);
        return redirect()->route('home');
    }
}
