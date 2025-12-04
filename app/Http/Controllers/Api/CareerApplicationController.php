<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\CareerApplicationMail;
use App\Models\Karier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CareerApplicationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'karier_id' => 'required|exists:kariers,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'cv' => 'required|file|mimes:pdf|max:5120', // Maksimal 5MB
                'experience' => 'required|string|max:255',
                'notice_period' => 'required|string|max:255',
                'vacancy_source' => 'required|string|max:255',
                'motivation' => 'required|string',
                'terms_accepted' => 'required|accepted',
            ]);

            // Dapatkan data karier
            $karier = Karier::findOrFail($validated['karier_id']);
            
            // Dapatkan file CV
            $file = $request->file('cv');
            $filePath = $file->getRealPath();
            $fileName = $file->getClientOriginalName();
            $mimeType = $file->getMimeType();

            // Kirim email
            Mail::to($karier->email)
                ->send(new CareerApplicationMail([
                    'karier' => $karier,
                    'application' => $validated,
                    'cv' => [
                        'path' => $filePath,
                        'name' => $fileName,
                        'mime' => $mimeType,
                    ]
                ]));

            return response()->json([
                'success' => true,
                'message' => 'Lamaran berhasil dikirim'
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Error submitting application: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim lamaran',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
}