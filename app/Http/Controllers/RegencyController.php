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

        $query = Regency::with('province')
            ->when($provinceId, function ($q) use ($provinceId) {
                return $q->where('province_id', $provinceId);
            })
            ->when($search, function ($q) use ($search) {
                return $q->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                        ->orWhere('population', 'like', "%$search%");
                });
            });

        $regencies = $query->paginate(10);

        $provinces = Province::all();
        return $regencies;
        return view('regencies.index', [
            'regencies' => $regencies,
            'provinces' => $provinces,
            'selectedProvince' => $provinceId,
            'searchQuery' => $search
        ]);
    }
}
