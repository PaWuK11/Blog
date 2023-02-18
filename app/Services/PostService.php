<?php


namespace App\Services;


use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\UnderCategory;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\Interfaces\PostServiceInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class PostService implements PostServiceInterface
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository){
        $this->postRepository = $postRepository;
    }

    public function savePostData($request){
        return $this->postRepository->create($request);
    }

    public function getById($id){
        return $this->postRepository->getById($id);
    }

    public function getAllPosts(){
        return $this->postRepository->getAll();
    }

    public function getPost($id){
        return $this->postRepository->getById($id);
    }

    public function showPost($slugTitle, $slugCategory){
        return $this->postRepository->showPost($slugTitle, $slugCategory);
    }

    public function postSearching(SearchRequest $request)
    {
        return $this->postRepository->postSearching($request);
    }

    public function postSyncUnderCategory($request, $id){
        return $this->postRepository->postSyncUnderCategory($request, $id);
    }

    public function postSyncTags($request, $id){
        return $this->postRepository->postSyncTags($request, $id);
    }

    public function postUpdate($request, $id){
        return $this->postRepository->postUpdate($request, $id);
    }

    public function showUnapprovedPosts(){
        return $this->postRepository->showUnapprovedPosts();
    }

    public function postApprove($request){
        return $this->postRepository->postApprove($request);
    }

    public function deleteNotApprovedPost($request){
        $this->postRepository->deleteNotApprovedPost($request);
    }
}
