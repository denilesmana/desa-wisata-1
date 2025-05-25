<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\User;
use App\Models\PaketWisata;
use Barryvdh\DomPDF\Facade\Pdf;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    private function getDashboardData($title = 'Dashboard')
    {
        $now = now();
        $lastMonth = $now->copy()->subDays(30);
        $twoMonthsAgo = $now->copy()->subDays(60);

        // Reservasi data
        $totalReservasi = Reservasi::count();
        $reservasis = Reservasi::with('user')->latest()->get();
        $statusCounts = Reservasi::groupBy('status_reservasi_wisata')
            ->selectRaw('status_reservasi_wisata, COUNT(*) as total')
            ->pluck('total', 'status_reservasi_wisata')
            ->toArray();

        // Reservasi percentage change
        $currentReservasiCount = Reservasi::where('created_at', '>=', $lastMonth)->count();
        $previousReservasiCount = Reservasi::whereBetween('created_at', [$twoMonthsAgo, $lastMonth])->count();
        $percentageChange = $this->calculatePercentageChange($currentReservasiCount, $previousReservasiCount);

        // Users data
        $totalUsers = User::count();
        $currentUsersCount = User::where('created_at', '>=', $lastMonth)->count();
        $previousUsersCount = User::whereBetween('created_at', [$twoMonthsAgo, $lastMonth])->count();
        $percentageChangeUsers = $this->calculatePercentageChange($currentUsersCount, $previousUsersCount);

        // Paket Wisata data
        $totalPaketWisata = PaketWisata::count();
        $currentPaketCount = PaketWisata::where('created_at', '>=', $lastMonth)->count();
        $previousPaketCount = PaketWisata::whereBetween('created_at', [$twoMonthsAgo, $lastMonth])->count();
        $percentageChangePaket = $this->calculatePercentageChange($currentPaketCount, $previousPaketCount);

        // Pendapatan data
        $totalPendapatan = Reservasi::sum('total_bayar');
        $currentPendapatan = Reservasi::where('created_at', '>=', $lastMonth)->sum('total_bayar');
        $previousPendapatan = Reservasi::whereBetween('created_at', [$twoMonthsAgo, $lastMonth])->sum('total_bayar');
        $percentageChangePendapatan = $this->calculatePercentageChange($currentPendapatan, $previousPendapatan);

        return compact(
            'totalReservasi',
            'percentageChange',
            'totalUsers',
            'percentageChangeUsers',
            'totalPaketWisata',
            'percentageChangePaket',
            'totalPendapatan',
            'percentageChangePendapatan',
            'statusCounts',
            'reservasis',
            'title'
        );
    }

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous > 0) {
            return (($current - $previous) / $previous) * 100;
        }
        return 0;
    }

    public function index()
    {
        return view('be.dashboard', $this->getDashboardData('Dashboard'));
    }

    public function bendahara()
    {
        return view('be.dashboard', $this->getDashboardData('Bendahara'));
    }

    public function pemilik()
    {
        return view('be.dashboard', $this->getDashboardData('Pemilik'));
    }

    public function karyawan()
    {
        return view('be.dashboard', $this->getDashboardData('Karyawan'));
    }


    public function downloadPDF()
    {
        $data = $this->getDashboardData('Laporan Dashboard');
        $data['reservasis'] = Reservasi::with('user', 'pelanggan.user')->latest()->get();

        $pdf = PDF::loadView('be.dashboard_pdf', $data);
        $pdf->save(storage_path('app/public/laporan_dashboard.pdf'));
        
        return response()->download(storage_path('app/public/laporan_dashboard.pdf'));
    }

    public function pelanggan()
    {
        return view('fe.home', ['title' => 'Pelanggan']);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
