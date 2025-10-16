<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Exports\AppointmentsExport;
use Maatwebsite\Excel\Facades\Excel;


class AppointmentController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        $appointments = Auth::user()
            ->appointments()
            ->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->get();

        $lastAppointment = $user->appointments()->latest()->first();
        $canCreateAppointment = true;
        if ($lastAppointment && in_array($lastAppointment->status, ['Pending', 'Under Review'])) {
            $canCreateAppointment = false;
        }

        return view('pages.dashboard.customer.appointment.index', compact('appointments', 'canCreateAppointment', 'lastAppointment'));
    }
    public function store(Request $request)
    {

        $user = Auth::user();

        $lastAppointment = $user->appointments()->latest()->first();
        if ($lastAppointment && in_array($lastAppointment->status, ['Pending', 'Under Review'])) {
            return redirect()->route('appointment.index')
                ->with('error', 'You already have an active appointment request. Please wait until it is processed.');
        }



        $validatedData = $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        $questionnaire = $user->questionnaire;

        $dataToSave = [
            'user_id' => $user->id,
            'questionnaire_id' => $questionnaire->id,
            'appointment_date' => $validatedData['appointment_date'],
            'appointment_time' => $validatedData['appointment_time'],
            'status' => 'Pending',
        ];

        Appointment::create($dataToSave);

        return redirect()->route('appointment.index')->with('status', 'Appointment request sent successfully!');
    }
    public function export(Request $request)
    {
        // Ambil semua filter dari request
        $filters = $request->only(['status', 'appointment_from', 'appointment_to']);

        // Buat nama file yang unik dengan tanggal
        $fileName = 'appointments_' . now()->format('Y-m-d_H-i-s') . '.xlsx';

        // Panggil class export dan mulai download
        return Excel::download(new AppointmentsExport($filters), $fileName);
    }
}
