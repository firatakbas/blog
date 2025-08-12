<?php

namespace App\Services;

use App\Repositories\BlogRepository;

class BlogService
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function all()
    {
        return $this->blogRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->blogRepository->create($data);
    }

    public function getById(int $id)
    {
        return $this->blogRepository->getById($id);
    }

    public function update(int $id, array $data)
    {
        return $this->blogRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->blogRepository->delete($id);
    }
}
