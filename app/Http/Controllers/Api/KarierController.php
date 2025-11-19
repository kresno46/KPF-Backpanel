<?php

namespace App\Http\Controllers\API;

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
        $kariers = Karier::latest()->get(['id', 'nama_kota', 'posisi', 'slug', 'created_at']);
        return response()->json([
            'success' => true,
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
            ->get(['id', 'nama_kota', 'posisi', 'slug', 'created_at']);
            
        return response()->json([
            'success' => true,
            'data' => $kariers
        ]);
    }
}
