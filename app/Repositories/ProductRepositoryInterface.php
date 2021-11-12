<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function getAll();

    public function save($data);

    public function deleteById($id);
}
