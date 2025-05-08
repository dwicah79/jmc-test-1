<?php

namespace App\Repositories\Interfaces;

interface ProvinceRepositoryInterface
{
    public function all($perpage = 10);
    public function create(array $data);
    public function find($id);
    public function update($id, array $data);
    public function delete($id);
    public function getAllWithPopulationSum();
    public function getAllSorted();
}
