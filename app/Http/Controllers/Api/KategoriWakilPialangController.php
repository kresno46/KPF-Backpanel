<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KategoriWakilPialang;
use Illuminate\Http\Request;

class KategoriWakilPialangController extends Controller
{
    public function index()
    {
        $kategoriWakilPialang = KategoriWakilPialang::all();
        return response()->json($kategoriWakilPialang);
    }

    /**
     * Get kategori detail by slug
     */
    public function showBySlug($slug)
    {
        $kategori = KategoriWakilPialang::where('slug', $slug)
            ->withCount('wakilPialang')
            ->firstOrFail();
            
        return response()->json([
            'success' => true,
            'data' => $kategori
        ]);
    }

    /**
     * Get wakil pialang by kategori slug
     */
    public function getWakilByKategori($slug)
    {
        try {
            $kategori = KategoriWakilPialang::where('slug', $slug)->first();
            
            if (!$kategori) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kategori tidak ditemukan',
                    'data' => []
                ], 404);
            }
            
            // Log data asli dari database
            $dataAsli = $kategori->wakilPialang()
                ->select(['id', 'nama', 'nomor_izin', 'status', 'sort_order'])
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get()
                ->toArray();
            \Log::info('Data asli dari database:', $dataAsli);
                
            // Mapping data untuk response
            $wakilPialang = $kategori->wakilPialang()
                ->select(['id', 'nama', 'nomor_izin', 'status', 'sort_order'])
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get()
                ->map(function($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->nama,  // Pastikan ini sesuai dengan yang diharapkan frontend
                        'nomor_izin' => $item->nomor_izin,
                        'status' => $item->status,
                        'sort_order' => $item->sort_order,
                    ];
                })
                ->toArray();
                    
            \Log::info('Data setelah mapping:', $wakilPialang);
                
            return response()->json([
                'success' => true,
                'data' => $wakilPialang,
                'kategori' => [
                    'id' => $kategori->id,
                    'nama_kategori' => $kategori->nama_kategori,
                    'slug' => $kategori->slug
                ]
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error in getWakilByKategori: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
