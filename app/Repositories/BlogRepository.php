<?php

namespace App\Repositories;

use App\Interfaces\BlogRepositoryInterface;
use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{

    public function getAll()
    {
        return Blog::orderBy('id', 'desc')->get();
    }

    public function getById(int $id)
    {
        return Blog::findOrFail($id);
    }

    public function create(array $data)
    {
        return Blog::create($data);
    }

    public function update(int $id, array $data)
    {
        $blog = $this->getById($id);
        return $blog->update($data);
    }

    public function delete(int $id)
    {
        $blog = $this->getById($id);
        return $blog->delete();
    }
}
