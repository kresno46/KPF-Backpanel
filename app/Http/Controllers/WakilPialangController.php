<?php

namespace App\Http\Controllers;

use App\Models\KategoriWakilPialang;
use App\Models\WakilPialang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WakilPialangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $slug)
    {
        try {
            // Mendapatkan kategori berdasarkan slug atau akan gagal jika tidak ditemukan
            $kategori = KategoriWakilPialang::where('slug', $slug)->firstOrFail();

            // Mengambil data Wakil Pialang berdasarkan kategori dengan urutan dapat diatur manual
            $wakilPialang = WakilPialang::where('category_id', $kategori->id)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();

            // Mengirimkan data ke view
            return view('wakil.index', compact('wakilPialang', 'kategori'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Jika kategori tidak ditemukan, arahkan ke halaman kategori dengan pesan error
            return redirect()->route('kategori-wakil.index')->with('error', 'Kategori tidak ditemukan');
        }
    }

    public function create($slug)
    {
        try {
            // Menemukan kategori berdasarkan slug
            $kategori = KategoriWakilPialang::where('slug', $slug)->firstOrFail();
            return view('wakil.create', compact('kategori'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Jika kategori tidak ditemukan, arahkan ke halaman kategori dengan pesan error
            return redirect()->route('kategori-wakil.index')->with('error', 'Kategori tidak ditemukan');
        }
    }

    public function store(Request $request, $slug)
    {
        try {
            // Menemukan kategori berdasarkan slug
            $kategori = KategoriWakilPialang::where('slug', $slug)->firstOrFail();

            // Validasi data yang diterima
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'nomor_izin' => 'required|string|max:100',
                'status' => 'required|in:aktif,non-aktif',
            ]);

            $nextOrder = WakilPialang::where('category_id', $kategori->id)->max('sort_order') + 1;

            // Menyimpan data Wakil Pialang
            WakilPialang::create([
                'nama' => $validated['nama'],
                'nomor_izin' => $validated['nomor_izin'],
                'status' => $validated['status'],
                'category_id' => $kategori->id,
                'sort_order' => $nextOrder,
            ]);

            return redirect()->route('wakil.index', $slug)->with('success', 'Wakil Pialang berhasil ditambahkan.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Jika kategori tidak ditemukan, arahkan ke halaman kategori dengan pesan error
            return redirect()->route('kategori-wakil.index')->with('error', 'Kategori tidak ditemukan');
        }
    }

    public function edit($slug, $id)
    {
        try {
            // Menemukan kategori dan wakil pialang berdasarkan slug dan ID
            $kategori = KategoriWakilPialang::where('slug', $slug)->firstOrFail();
            $wakil = WakilPialang::findOrFail($id);

            return view('wakil.edit', compact('wakil', 'kategori'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Jika kategori atau wakil pialang tidak ditemukan, arahkan ke halaman kategori dengan pesan error
            return redirect()->route('wakil.index', $slug)->with('error', 'Data tidak ditemukan.');
        }
    }

    public function update(Request $request, $slug, $id)
    {
        try {
            // Menemukan kategori dan wakil pialang berdasarkan slug dan ID
            $kategori = KategoriWakilPialang::where('slug', $slug)->firstOrFail();
            $wakil = WakilPialang::findOrFail($id);

            // Validasi data yang diterima
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'nomor_izin' => 'required|string|max:100',
                'status' => 'required|in:aktif,non-aktif',
            ]);

            // Memperbarui data Wakil Pialang
            $wakil->update([
                'nama' => $validated['nama'],
                'nomor_izin' => $validated['nomor_izin'],
                'status' => $validated['status'],
            ]);

            return redirect()->route('wakil.index', $slug)->with('success', 'Wakil Pialang berhasil diperbarui.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Jika kategori atau wakil pialang tidak ditemukan, arahkan ke halaman kategori dengan pesan error
            return redirect()->route('wakil.index', $slug)->with('error', 'Data tidak ditemukan.');
        }
    }

    public function reorder(Request $request, $slug)
    {
        $request->validate([
            'order'   => 'required|array',
            'order.*' => 'integer',
        ]);

        $kategori = KategoriWakilPialang::where('slug', $slug)->firstOrFail();
        $ids = $request->order;

        DB::transaction(function () use ($ids, $kategori) {
            foreach ($ids as $index => $id) {
                WakilPialang::where('id', $id)
                    ->where('category_id', $kategori->id)
                    ->update(['sort_order' => $index + 1]);
            }
        });

        return response()->json(['success' => true]);
    }

    public function destroy($slug, $id)
    {
        // Menemukan Wakil Pialang berdasarkan ID dan slug kategori
        $wakil = WakilPialang::where('id', $id)
            ->whereHas('kategoriWakilPialang', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->first();

        if (!$wakil) {
            return redirect()->route('wakil.index', ['slug' => $slug])->with('error', 'Data tidak ditemukan.');
        }

        // Menghapus wakil pialang
        $wakil->delete();

        return redirect()->route('wakil.index', ['slug' => $slug])->with('success', 'Wakil Pialang berhasil dihapus.');
    }
}
