<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function get(array $conditions);

    public function save(array $data);

    public function deleteById($id);
}
