<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\RegencyRepositoryInterface;

class RegencyController extends Controller
{
    protected $regencyRepository;

    public function __construct(RegencyRepositoryInterface $regencyRepository)
    {
        $this->regencyRepository = $regencyRepository;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $provinceId = $request->input('province_id');

        $regencies = Regency::with('province')
            ->when($provinceId, function ($query) use ($provinceId) {
                return $query->where('province_id', $provinceId);
            })
            ->when($search, function ($query) use ($search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                        ->orWhere('population', 'like', "%$search%")
                        ->orWhereHas('province', function ($q) use ($search) {
                            $q->where('name', 'like', "%$search%");
                        });
                });
            })
            ->orderBy('name')
            ->paginate(10);

        $provinces = Province::orderBy('name')->get();

        return view('regencies.index', compact('regencies', 'provinces'));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'population' => 'required|integer',
                'province_id' => 'required|exists:provinces,id',
            ]);

            $this->regencyRepository->create($data);

            return back()->with('success', 'Regency created successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create regency');
        }
    }

    public function edit($regencyId)
    {
        try {
            $regency = $this->regencyRepository->find($regencyId);
            $provinces = Province::all();
            return view('regencies.edit', compact('regency', 'provinces'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to retrieve regency');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'population' => 'required|integer',
                'province_id' => 'required|exists:provinces,id',
            ]);

            $this->regencyRepository->update($id, $data);

            return redirect()->route('regencies.index')->with('success', 'Regency updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update regency');
        }
    }

    public function destroy($id)
    {
        try {
            $this->regencyRepository->delete($id);
            return back()->with('success', 'Regency deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete regency');
        }
    }
}
