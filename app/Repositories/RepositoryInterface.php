<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function get(array $conditions);

    public function save(array $data);

    public function deleteById($id);
}
