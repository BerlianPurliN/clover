<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity; // <-- Impor model dari paket

class AuditLogController extends Controller
{
    public function index()
    {
        // Ambil semua data log, urutkan dari yang terbaru, dan paginasi
        $activities = Activity::with('causer') // Ambil juga data user yang melakukannya
            ->latest()
            ->paginate(20);

        return view('pages.dashboard.admin.audit_log.index', compact('activities'));
    }
}
