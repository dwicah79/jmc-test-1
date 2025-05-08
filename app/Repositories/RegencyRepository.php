<?php
namespace App\Repositories;
use App\Models\Regency;
use App\Repositories\Interfaces\RegencyRepositoryInterface;

class RegencyRepository implements RegencyRepositoryInterface
{
    public function all($provinceId = null, $paginate = false)
    {
        $query = Regency::with('province');

        if ($provinceId) {
            $query->where('province_id', $provinceId);
        }

        return $paginate ? $query->paginate(10) : $query->get();
    }

    public function create(array $data)
    {
        return Regency::create($data);
    }

    public function find($id)
    {
        return Regency::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $regency = $this->find($id);
        $regency->update($data);
        return $regency;
    }

    public function delete($id)
    {
        return Regency::destroy($id);
    }

    public function getAllWithProvince()
    {
        return Regency::with('province')
            ->orderBy('province_id')
            ->orderBy('name')
            ->get();
    }

    public function getByProvince($provinceId)
    {
        return Regency::with('province')
            ->where('province_id', $provinceId)
            ->orderBy('name')
            ->get();
    }

    public function getAllSorted()
    {
        return Regency::with('province')
            ->orderBy('province_id')
            ->orderBy('name')
            ->get();
    }
}
