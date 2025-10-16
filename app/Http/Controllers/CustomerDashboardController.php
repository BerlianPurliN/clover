<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class CustomerDashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard customer.
     */
    public function index()
    {
        $user = Auth::user();

        $age = null;

        if ($user->dob) {
            $age = Carbon::parse($user->dob)->age;
        }

        return view('pages.dashboard.customer.dashboard.index', compact('user', 'age'));
    }
    public function update(Request $request)
    {
        // 1. Ambil user yang sedang login
        $user = Auth::user();

        // 2. Validasi semua input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'mobile_phone' => 'required|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 3. Handle upload foto profil jika ada
        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama jika ada
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Simpan foto baru dan dapatkan path-nya
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        // 4. Update data pengguna dengan data yang sudah divalidasi
        $user->name = $validated['name'];
        $user->nickname = $validated['nickname'];
        $user->mobile_phone = $validated['mobile_phone'];

        // Simpan semua perubahan ke database
        $user->save();

        // 5. Redirect kembali ke halaman dashboard dengan pesan sukses
        return redirect()->route('customer.dashboard')->with('status', 'Profile updated successfully!');
    }
}
