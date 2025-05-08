<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;

class ProvinceController extends Controller
{
    protected $provinceRepository;

    public function __construct(ProvinceRepositoryInterface $provinceRepository)
    {
        $this->provinceRepository = $provinceRepository;
    }

    public function index()
    {
        $provinces = $this->provinceRepository->getAllProvinces();
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $province = $this->provinceRepository->createProvince($data);

            return response()->json($province, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create province'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $province = $this->provinceRepository->updateProvince($id, $data);

            return response()->json($province, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update province'], 500);
        }
    }

    public function destroy($provinceId)
    {
        try {
            $this->provinceRepository->deleteProvince($provinceId);
            return response()->json(['message' => 'Province deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete province'], 500);
        }
    }
}
