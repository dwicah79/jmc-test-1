<?php

namespace App\Repositories\Interfaces;

interface RegencyRepositoryInterface
{
    public function all($provinceId = null);
    public function create(array $data);
    public function find($id);
    public function update($id, array $data);
    public function delete($id);
    public function getAllWithProvince();
    public function getByProvince($provinceId);
    public function getAllSorted();
}
