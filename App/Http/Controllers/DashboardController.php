<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\User;
use App\Models\PaketWisata;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $totalReservasi = Reservasi::count();
        $reservasis = Reservasi::with('user')->latest()->get();
        $statusCounts = Reservasi::selectRaw('status_reservasi_wisata, COUNT(*) as total')
            ->groupBy('status_reservasi_wisata')
            ->pluck('total', 'status_reservasi_wisata')
            ->toArray();

        $now = now();
        $lastMonth = $now->copy()->subDays(30);
        $currentCount = Reservasi::where('created_at', '>=', $lastMonth)->count();
        $previousCount = Reservasi::where('created_at', '<', $lastMonth)
                                  ->where('created_at', '>=', $lastMonth->copy()->subDays(30))
                                  ->count();

        $percentageChange = 0;
        if ($previousCount > 0) {
            $percentageChange = (($currentCount - $previousCount) / $previousCount) * 100;
        }

        $totalUsers = User::count(); 
        $totalUsersLast30Days = User::where('created_at', '>=', now()->subDays(30))->count();
        $totalUsersPrevious30Days = User::whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])->count();
        $percentageChangeUsers = $totalUsersPrevious30Days > 0 ? (($totalUsersLast30Days - $totalUsersPrevious30Days) / $totalUsersPrevious30Days) * 100 : 0;

        $totalPaketWisata = PaketWisata::count();
        $totalPaketLast30Days = PaketWisata::where('created_at', '>=', now()->subDays(30))->count();
        $totalPaketPrevious30Days = PaketWisata::whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])->count();
        $percentageChangePaket = $totalPaketPrevious30Days > 0 ? (($totalPaketLast30Days - $totalPaketPrevious30Days) / $totalPaketPrevious30Days) * 100 : 0;

        $totalPendapatan = Reservasi::sum('total_bayar'); 
        $pendapatanLast30Days = Reservasi::where('created_at', '>=', now()->subDays(30))->sum('total_bayar');
        $pendapatanPrevious30Days = Reservasi::whereBetween('created_at', [now()->subDays(60), now()->subDays(30)])->sum('total_bayar');
    
        $percentageChangePendapatan = $pendapatanPrevious30Days > 0 
        ? (($pendapatanLast30Days - $pendapatanPrevious30Days) / $pendapatanPrevious30Days) * 100 
        : 0;


        return view('be.dashboard', compact('totalReservasi', 'percentageChange', 'totalUsers', 'percentageChangeUsers', 'totalPaketWisata', 'percentageChangePaket', 'totalPendapatan', 'percentageChangePendapatan', 'statusCounts', 'reservasis' ), [
            'title' => 'Dashboard'
        ]);
    }


    public function bendahara()
    {
        return view('be.dashboard', [
            'title' => 'Bendahara'
        ]);
    }

    public function pemilik()
    {
        return view('be.dashboard', [
            'title' => 'Pemilik'
        ]);
    }

    public function karyawan()
    {
        return view('be.dashboard', [
            'title' => 'Karyawan'
        ]);
    }

    public function pelanggan()
    {
        return view('fe.home', [
            'title' => 'Pelanggan'
        ]);
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
