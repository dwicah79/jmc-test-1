<?php

namespace App\Http\Controllers;


use App\Models\Regency;
use App\Models\Province;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Repositories\Interfaces\RegencyRepositoryInterface;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;

class ReportController extends Controller
{
    protected $regencyRepository;
    protected $provinceRepository;

    public function __construct(
        ProvinceRepositoryInterface $provinceRepository,
        RegencyRepositoryInterface $regencyRepository
    ) {
        $this->provinceRepository = $provinceRepository;
        $this->regencyRepository = $regencyRepository;
    }

    public function printofpopulationPerProvince(Request $request)
    {
        $provinces = $this->provinceRepository->getAllWithPopulationSum();
        $pdf = PDF::loadView('Report.populationprovince', compact('provinces'));
        return $pdf->stream('laporan-penduduk-per-provinsi.pdf');
    }

    public function printofpopulationPerRegency(Request $request)
    {
        $search = $request->input('search');
        $provinceId = $request->input('province_id');

        // Query dengan filter yang sama seperti di index
        $regencies = Regency::with('province')
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('population', 'like', "%{$search}%");
            })
            ->when($provinceId, function ($query) use ($provinceId) {
                return $query->where('province_id', $provinceId);
            })
            ->orderBy('name')
            ->get();

        $selectedProvince = $provinceId ? Province::find($provinceId) : null;

        $pdf = Pdf::loadView('Report.populationregency', [
            'regencies' => $regencies,
            'selectedProvince' => $selectedProvince,
            'searchTerm' => $search
        ]);

        $filename = 'laporan-kabupaten-' . now()->format('Ymd-His') . '.pdf';

        return $pdf->stream($filename);
    }
}
