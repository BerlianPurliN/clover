<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with('user')->latest();

        // Terapkan filter STATUS
        $query->when($request->input('status'), function ($q, $status) {
            return $q->where('status', $status);
        });

        // Terapkan filter RENTANG TANGGAL JANJI TEMU
        $query->when($request->input('appointment_from'), function ($q, $date) {
            return $q->whereDate('appointment_date', '>=', $date);
        });
        $query->when($request->input('appointment_to'), function ($q, $date) {
            return $q->whereDate('appointment_date', '<=', $date);
        });

        // Terapkan filter RENTANG TANGGAL UPDATE
        $query->when($request->input('updated_from'), function ($q, $date) {
            return $q->whereDate('updated_at', '>=', $date);
        });
        $query->when($request->input('updated_to'), function ($q, $date) {
            return $q->whereDate('updated_at', '<=', $date);
        });

        $appointments = $query->paginate(10)->withQueryString();

        return view('pages.dashboard.admin.appointments.index', compact('appointments'));
    }

    public function update(Request $request, Appointment $appointment)
    {

        // dd($request->all());

        $request->validate([
            'status' => 'required|in:Pending,Under Review,Approved,Rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $appointment->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!'
        ]);
    }
}
