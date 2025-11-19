<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\CareerApplicationMail;
use App\Models\CareerApplication;
use App\Models\Karier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CareerApplicationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'karier_id' => 'required|exists:kariers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'cover_letter' => 'nullable|string',
        ]);

        // Upload file
        $file = $request->file('resume');
        $fileName = 'resumes/' . Str::random(40) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('public', $fileName);

        // Simpan data aplikasi
        $application = CareerApplication::create([
            'karier_id' => $request->karier_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'resume_path' => $fileName,
            'cover_letter' => $request->cover_letter,
            'status' => 'pending',
        ]);

        // Kirim email notifikasi
        $karier = Karier::findOrFail($request->karier_id);
        Mail::to($karier->email ?? config('mail.from.address'))
            ->send(new CareerApplicationMail($application));

        return response()->json([
            'message' => 'Lamaran berhasil dikirim',
            'data' => $application
        ], 201);
    }
}
