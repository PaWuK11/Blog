<?php


namespace App\Services;


use App\Models\User;
use App\Notifications\AdminBanUserNotification;
use App\Notifications\DeletePostNotification;
use App\Notifications\UserApprovedNotification;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Carbon\Carbon;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAuthorAndNotify($request){
        $author = $this->userRepository->getAuthor($request);

        foreach ($author as $a){
            $a->notify(new DeletePostNotification());
        }
        return $author;
    }

    public function getNotBannedUsers(){
        return $this->userRepository->getNotBannedUsers();
    }

    public function ban($request){
        $banComment = $request->comment;
        $expired = Carbon::parse($request->date);
        $user = $this->userRepository->getById($request->id);
        $user->ban([
            'comment' => $banComment,
            'expired_at' => $expired,
        ]);
        $user->notify(new AdminBanUserNotification($banComment, $expired));

        return $user;
    }

    public function getUnApprovedUsers(){
        return $this->userRepository->getUnApprovedUsers();
    }

    public function storeApprovedUser($request){
        if($request->is_author == 'on'){
            $this->userRepository->userUpdateIfAuthorApproved($request);
            $user = $this->userRepository->getUserIdFromRequest($request);

            foreach ($user as $u){
                $u->notify(new UserApprovedNotification());
            }
            return redirect()->back();
        }else if($request->declined == 1){
            $this->userRepository->userUpdateIfAuthorNotApproved($request);
            return redirect()->back();
        }
    }
}
