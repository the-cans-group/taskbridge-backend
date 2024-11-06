<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class Service
{
    protected $repository;

    public function initialize($repository): void
    {
        $this->repository = $repository;
    }

    public function getAll(?int $page = 1, ?int $perPage = 10, array $filters = [])
    {
        return $this->repository->getAll($page, $perPage, $filters);
    }

    public function getById(string $id): ?Model
    {
        return $this->repository->getById($id);
    }

    public function findByIds(array $Ids)
    {
        return $this->repository->findByIds($Ids);
    }

    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    public function update(string $id, array $data): ?Model
    {
        return $this->repository->update($id, $data);
    }

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }

    public function search(array $search)
    {
        return $this->repository->search($search);
    }
}
