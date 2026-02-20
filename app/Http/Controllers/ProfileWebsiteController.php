<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileWebsiteController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('profile-website.index', compact('profile'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'map_link' => 'nullable|url|max:255',
            'complaint_link' => 'nullable|url|max:255',
            'phone' => 'nullable|string|max:50',
            'fax' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
        ]);

        $data = $request->only([
            'site_name',
            'description',
            'address',
            'map_link',
            'complaint_link',
            'phone',
            'fax',
            'email',
        ]);

        $profile = Profile::first();

        if ($profile) {
            $profile->update($data);
        } else {
            $data['content'] = '';
            Profile::create($data);
        }

        return redirect()->back()->with('success', 'Informasi website berhasil disimpan.');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->back()->with('success', 'Informasi website berhasil dihapus.');
    }
}
