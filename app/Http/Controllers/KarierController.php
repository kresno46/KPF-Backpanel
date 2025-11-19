<?php

namespace App\Http\Controllers;

use App\Models\Karier;
use App\Mail\CareerApplicationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class KarierController extends Controller
{
    public function index()
    {
        $kariers = Karier::latest()->paginate(10);
        return view('karier.index', compact('kariers'));
    }

    public function create()
    {
        return view('karier.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kota' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'responsibilities' => 'required|string',
            'qualifications' => 'required|string',
            'email' => 'required|email',
        ]);

        $karier = Karier::create($validated);

        // Kirim email notifikasi
        if ($karier->email) {
            Mail::to($karier->email)
                ->send(new CareerApplicationMail($karier));
        }

        return redirect()->route('karier.index')
            ->with('success', 'Lowongan kerja berhasil ditambahkan dan notifikasi email telah dikirim');
    }

    public function edit(Karier $karier)
    {
        return view('karier.edit', compact('karier'));
    }

    public function update(Request $request, Karier $karier)
    {
        $validated = $request->validate([
            'nama_kota' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'responsibilities' => 'required|string',
            'qualifications' => 'required|string',
            'email' => 'required|email',
        ]);

        $karier->update($validated);

        // Kirim email notifikasi jika email berubah
        if ($karier->wasChanged('email') && $karier->email) {
            Mail::to($karier->email)
                ->send(new CareerApplicationMail($karier));
        }

        return redirect()->route('karier.index')
            ->with('success', 'Lowongan kerja berhasil diperbarui');
    }

    public function destroy(Karier $karier)
    {
        $karier->delete();
        return redirect()->route('karier.index')
            ->with('success', 'Lowongan kerja berhasil dihapus');
    }
}
