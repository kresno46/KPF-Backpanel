<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Banner;
use App\Models\Berita;
use App\Models\Jfx;
use App\Models\Karier;
use App\Models\KategoriWakilPialang;
use App\Models\Spa;
use App\Models\WakilPialang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $widget = [
            'users'          => User::count(),
            'wakil_total'    => WakilPialang::count(),
            'wakil_aktif'    => WakilPialang::where('status', 'aktif')->count(),
            'wakil_nonaktif' => WakilPialang::where('status', 'non-aktif')->count(),
            'kategori'       => KategoriWakilPialang::count(),
            'berita'         => Berita::count(),
            'karier'         => Karier::count(),
            'banner'         => Banner::count(),
            'spa'            => Spa::count(),
            'jfx'            => Jfx::count(),
        ];

        $latest = [
            'wakil'  => WakilPialang::with('kategoriWakilPialang')->latest('updated_at')->take(5)->get(),
            'berita' => Berita::latest('updated_at')->take(5)->get(),
        ];

        return view('home', compact('widget', 'latest'));
    }
}
