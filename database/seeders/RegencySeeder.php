<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $regencyRepository;
    public function __construct(\App\Repositories\Interfaces\RegencyRepositoryInterface $regencyRepository)
    {
        $this->regencyRepository = $regencyRepository;
    }
    public function run(): void
    {
        $jawaTengahRegencies = [
            ['name' => 'Kota Semarang', 'population' => 1621384],
            ['name' => 'Kota Surakarta', 'population' => 552542],
            ['name' => 'Kota Salatiga', 'population' => 192322],
            ['name' => 'Kota Pekalongan', 'population' => 307150],
            ['name' => 'Kota Tegal', 'population' => 273825],
            ['name' => 'Kabupaten Semarang', 'population' => 1023550],
            ['name' => 'Kabupaten Kendal', 'population' => 976771],
            ['name' => 'Kabupaten Demak', 'population' => 1168959],
            ['name' => 'Kabupaten Grobogan', 'population' => 1459296],
            ['name' => 'Kabupaten Pati', 'population' => 1325903],
            ['name' => 'Kabupaten Kudus', 'population' => 849184],
            ['name' => 'Kabupaten Jepara', 'population' => 1185567],
            ['name' => 'Kabupaten Rembang', 'population' => 645333],
            ['name' => 'Kabupaten Blora', 'population' => 884333],
            ['name' => 'Kabupaten Boyolali', 'population' => 1054638],
            ['name' => 'Kabupaten Sragen', 'population' => 976951],
            ['name' => 'Kabupaten Karanganyar', 'population' => 896991],
            ['name' => 'Kabupaten Wonogiri', 'population' => 1264657],
            ['name' => 'Kabupaten Sukoharjo', 'population' => 897291],
            ['name' => 'Kabupaten Klaten', 'population' => 1302469],
            ['name' => 'Kabupaten Magelang', 'population' => 1293031],
            ['name' => 'Kabupaten Temanggung', 'population' => 769843],
            ['name' => 'Kabupaten Purworejo', 'population' => 751634],
            ['name' => 'Kabupaten Wonosobo', 'population' => 879124],
            ['name' => 'Kabupaten Kebumen', 'population' => 1372819],
            ['name' => 'Kabupaten Banjarnegara', 'population' => 1024275],
            ['name' => 'Kabupaten Purbalingga', 'population' => 953304],
            ['name' => 'Kabupaten Banyumas', 'population' => 1757737],
            ['name' => 'Kabupaten Cilacap', 'population' => 1945206],
            ['name' => 'Kabupaten Brebes', 'population' => 1895217],
            ['name' => 'Kabupaten Tegal', 'population' => 1545499],
            ['name' => 'Kabupaten Pekalongan', 'population' => 961802],
            ['name' => 'Kabupaten Batang', 'population' => 773138],
        ];

        foreach ($jawaTengahRegencies as $regency) {
            $this->regencyRepository->create([
                'name' => $regency['name'],
                'population' => $regency['population'],
                'province_id' => 13,
            ]);
        }

        $acehRegencies = [
            ['name' => 'Aceh Besar', 'population' => 350000],
            ['name' => 'Banda Aceh', 'population' => 250000],
            ['name' => 'Langsa', 'population' => 180000],
            ['name' => 'Lhokseumawe', 'population' => 190000],
            ['name' => 'Sabang', 'population' => 40000],
            ['name' => 'Subulussalam', 'population' => 80000],
            ['name' => 'Bireuen', 'population' => 450000],
            ['name' => 'Aceh Utara', 'population' => 550000],
            ['name' => 'Aceh Timur', 'population' => 400000],
            ['name' => 'Aceh Tamiang', 'population' => 280000],
            ['name' => 'Nagan Raya', 'population' => 150000],
            ['name' => 'Pidie Jaya', 'population' => 160000],
            ['name' => 'Pidie', 'population' => 420000],
            ['name' => 'Gayo Lues', 'population' => 95000],
            ['name' => 'Bener Meriah', 'population' => 120000],
            ['name' => 'Aceh Tengah', 'population' => 220000],
            ['name' => 'Simeulue', 'population' => 90000],
            ['name' => 'Aceh Singkil', 'population' => 110000],
        ];

        foreach ($acehRegencies as $regency) {
            \App\Models\Regency::create([
                'name' => $regency['name'],
                'population' => $regency['population'],
                'province_id' => 1,
            ]);
        }
    }
}
