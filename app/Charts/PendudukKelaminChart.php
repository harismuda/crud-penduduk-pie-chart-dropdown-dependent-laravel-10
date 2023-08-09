<?php

namespace App\Charts;

use App\Models\penduduk;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class PendudukKelaminChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $pendudukKelamin = penduduk::get();
        $data = [
            $pendudukKelamin->where('jk','Laki-laki')->count(), 
            $pendudukKelamin->where('jk','Perempuan')->count(),
        ];
        $label = [
            'Laki-laki',
            'Perempuan',
        ];
        return $this->chart->pieChart()
            ->setTitle('Data penduduk berdasarkan jenis kelamin')
            ->setSubtitle(date('Y'))
            ->setWidth(500)
            ->setHeight(500)
            ->addData($data)
            ->setLabels($label);
    }
}
