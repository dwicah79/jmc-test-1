<?php

namespace App\Repositories;

use App\Models\Province;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;

class ProvinceRepository implements ProvinceRepositoryInterface
{
    public function all($perpage = 10)
    {
        return Province::paginate($perpage);
    }

    public function create(array $data)
    {
        return Province::create($data);
    }

    public function find($id)
    {
        return Province::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $provinsi = $this->find($id);
        $provinsi->update($data);
        return $provinsi;
    }

    public function delete($id)
    {
        return Province::destroy($id);
    }

    public function getAllWithPopulationSum()
    {
        return Province::withSum('regencies', 'population')
            ->orderBy('name')
            ->get();
    }

    public function getAllSorted()
    {
        return Province::orderBy('name')->get();
    }
}
