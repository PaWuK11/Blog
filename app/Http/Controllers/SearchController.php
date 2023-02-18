<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\Interfaces\PostServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    protected $postService;
    public function __construct(PostServiceInterface $postService){
        $this->postService = $postService;
    }

    public function index(SearchRequest $request){
        $posts = $this->postService->postSearching($request);

        return view('homepage', compact('posts'));
    }
}
