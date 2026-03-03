<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TinyMceController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:5120'],
        ]);

        $file = $request->file('file');
        $dir = public_path('img/uploads');

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $filename = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $filename);

        return response()->json([
            'location' => asset('img/uploads/' . $filename),
        ]);
    }
}
