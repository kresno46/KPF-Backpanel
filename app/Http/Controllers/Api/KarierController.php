<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Karier;
use Illuminate\Http\Request;

class KarierController extends Controller
{
    /**
     * Get all active job listings
     */
    public function index()
    {
        $kariers = Karier::latest()->get();
        
        return response()->json([
            'success' => true,
            'message' => 'Daftar data karier berhasil diambil',
            'data' => $kariers
        ]);
    }

    /**
     * Get job details by slug
     */
    public function show($slug)
    {
        $karier = Karier::where('slug', $slug)->firstOrFail();
        
        return response()->json([
            'success' => true,
            'data' => $karier
        ]);
    }

    /**
     * Get job listings by city
     */
    public function getByKota($kota)
    {
        $kariers = Karier::where('nama_kota', 'like', '%' . $kota . '%')
            ->latest()
            ->get();
            
        return response()->json([
            'success' => true,
            'message' => 'Data karier berdasarkan kota berhasil diambil',
            'data' => $kariers
        ]);
    }
}
