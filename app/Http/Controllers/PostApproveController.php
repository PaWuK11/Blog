<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Notifications\DeletePostNotification;
use App\Services\Interfaces\PostServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class PostApproveController extends Controller
{
    protected $postService;
    protected $userService;

    public function __construct(PostServiceInterface $postService, UserServiceInterface $userService)
    {
        $this->postService = $postService;
        $this->userService = $userService;
    }

    public function showToApprove(){
        $posts = $this->postService->showUnapprovedPosts();

        return view('approvePost', compact('posts'));
    }

    public function storeApprove(Request $request){
        $this->postService->postApprove($request);

        return redirect()->back()->with('success', 'Post was approved!');
    }

    public function drop(Request $request){
        $this->userService->getAuthorAndNotify($request);
        $this->postService->deleteNotApprovedPost($request);

        return redirect()->back()->with('success', 'Post was deleted!');
    }
}
