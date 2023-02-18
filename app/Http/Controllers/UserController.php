<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AdminBanUserNotification;
use App\Notifications\UserApprovedNotification;
use App\Services\Interfaces\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;


class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('approve');
    }

    public function all(){
        $users = $this->userService->getNotBannedUsers();

        return view('users', compact('users'));
    }

    public function ban(Request $request){
        $user = $this->userService->ban($request);

        return redirect()->back()->with('success', $user->name . ' is banned');
    }

    public function showToApprove()
    {
        $usersToApprove = $this->userService->getUnApprovedUsers();

        return view('approve', compact('usersToApprove'));
    }
    public function storeApprove(Request $request)
    {
        $this->userService->storeApprovedUser($request);

        return redirect()->route('approve')->with('error', 'Something went wrong');
    }

}
