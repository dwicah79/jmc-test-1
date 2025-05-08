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
        $provinces = $this->provinceRepository->all(10);
        return view('Province.index', compact('provinces'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $province = $this->provinceRepository->create($data);

            return back()->with('success', 'Province created successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create province'], 500);
        }
    }

    public function edit($provinceId)
    {
        try {
            $province = $this->provinceRepository->find($provinceId);
            return view('Province.edit', compact('province'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to retrieve province');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $province = $this->provinceRepository->update($id, $data);

            return redirect()->route('provinces.index')->with('success', 'Province updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update province');
        }
    }

    public function destroy($provinceId)
    {
        try {
            $this->provinceRepository->delete($provinceId);
            return back()->with('success', 'Province deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete province');
        }
    }
}
