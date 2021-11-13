<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function save($data);

    public function deleteById($id);
}
