<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CombinedUsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $query = User::where('role', 'customer');

        $query->when($request->input('search'), function ($q, $search) {
            // Cari berdasarkan nama, nickname, atau email
            return $q->where(function ($subQuery) use ($search) {
                $subQuery->where('name', 'like', "%{$search}%")
                    ->orWhere('nickname', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        });
        $query->when($request->input('gender'), function ($q, $gender) {
            return $q->where('gender', $gender);
        });

        $query->when($request->input('created_from'), function ($q, $date) {
            return $q->whereDate('created_at', '>=', $date);
        });
        $query->when($request->input('created_to'), function ($q, $date) {
            return $q->whereDate('created_at', '<=', $date);
        });

        // Filter berdasarkan rentang tanggal update profil (updated_at)
        $query->when($request->input('updated_from'), function ($q, $date) {
            return $q->whereDate('updated_at', '>=', $date);
        });
        $query->when($request->input('updated_to'), function ($q, $date) {
            return $q->whereDate('updated_at', '<=', $date);
        });

        // Ambil semua user dengan role 'customer', urutkan dari yang terbaru, dan gunakan pagination
        $users = User::where('role', operator: 'customer')
            ->latest()
            ->paginate(15);

        $users = $query->latest()->paginate(15)->withQueryString();

        // Kirim data users ke view
        return view('pages.dashboard.admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Laravel otomatis menemukan user berdasarkan ID di URL.
        // Kita juga bisa langsung mengakses data kuesionernya melalui relasi.
        return view('pages.dashboard.admin.users.show', compact('user'));
    }

    public function exportAll(Request $request)
    {
        // Ambil semua filter dari URL
        $filters = $request->only(['search', 'gender', 'created_from', 'created_to']);

        // Buat nama file yang dinamis
        $fileName = 'all_users_data_' . now()->format('Y-m-d') . '.xlsx';

        // Panggil class export "master" dan mulai download
        return Excel::download(new CombinedUsersExport($filters), $fileName);
    }
}
