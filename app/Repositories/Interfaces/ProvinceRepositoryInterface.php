<?php

namespace App\Repositories\Interfaces;

interface ProvinceRepositoryInterface
{
    public function getAllProvinces();
    public function getProvinceById($id);
    public function createProvince(array $data);
    public function updateProvince($id, array $data);
    public function deleteProvince($id);
}
