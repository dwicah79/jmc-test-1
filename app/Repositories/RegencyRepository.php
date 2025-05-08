<?php
namespace App\Repositories;
use App\Models\Regency;
use App\Repositories\Interfaces\RegencyRepositoryInterface;

class RegencyRepository implements RegencyRepositoryInterface
{
    public function all($provinsiId = null)
    {
        $query = Regency::with('province');
        if ($provinsiId) {
            $query->where('province', $provinsiId);
        }
        return $query->get();
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
        $kabupaten = $this->find($id);
        $kabupaten->update($data);
        return $kabupaten;
    }

    public function delete($id)
    {
        return Regency::destroy($id);
    }
}
