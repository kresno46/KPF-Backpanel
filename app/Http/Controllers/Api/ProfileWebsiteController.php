<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;

class ProfileWebsiteController extends Controller
{
    public function index()
    {
        $profile = Profile::first();

        return response()->json([
            'success' => true,
            'message' => 'Informasi website berhasil diambil',
            'data' => $profile,
        ]);
    }
}
