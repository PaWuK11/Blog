<?php


namespace App\Services;


use App\Repositories\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories(){
        return $this->categoryRepository->getAll();
    }

    public function saveCategory($request){
        return $this->categoryRepository->create($request);
    }

    public function getCategoriesBySlug($slug){
        return $this->categoryRepository->getCategoriesSlug($slug);
    }

    public function getAll(){
        return $this->categoryRepository->getAll();
    }
}
