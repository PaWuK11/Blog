<?php


namespace App\Services;


use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Services\Interfaces\TagServiceInterface;

class TagService implements TagServiceInterface
{
    protected $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getTags(){
        return $this->tagRepository->getAll();
    }

    public function getTagByTitle($tag){
        return $this->tagRepository->getTag($tag);
    }

    public function createTag($request){
        return $this->tagRepository->create($request);
    }
}
