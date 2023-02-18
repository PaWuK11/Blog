<?php


namespace App\Repositories;


abstract class CoreRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModel());
    }

    abstract public function getModel();

    public function start(){
        return $this->model;
    }

    public function getAll(){
        return $this->start()->all();
    }

    public function getById($id){
        return $this->start()->find($id);
    }
}

