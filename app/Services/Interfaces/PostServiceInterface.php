<?php


namespace App\Services\Interfaces;


interface PostServiceInterface
{

    public function postSearching(\App\Http\Requests\SearchRequest $request);
}
