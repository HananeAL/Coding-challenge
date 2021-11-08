<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function getAll();

    public function save($data);

    public function deleteById($id);
}
