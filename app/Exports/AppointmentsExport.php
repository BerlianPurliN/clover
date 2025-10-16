<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AppointmentsExport implements FromQuery, WithHeadings, WithMapping
{
    protected $filters;

    // Terima filter dari controller
    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    // Mendefinisikan query database berdasarkan filter
    public function query()
    {
        $query = Appointment::with('user')->latest();

        // Terapkan filter yang sama persis seperti di controller Anda
        $query->when($this->filters['status'] ?? null, function ($q, $status) {
            return $q->where('status', $status);
        });
        $query->when($this->filters['appointment_from'] ?? null, function ($q, $date) {
            return $q->whereDate('appointment_date', '>=', $date);
        });
        $query->when($this->filters['appointment_to'] ?? null, function ($q, $date) {
            return $q->whereDate('appointment_date', '<=', $date);
        });

        return $query;
    }

    // Mendefinisikan judul kolom di file Excel
    public function headings(): array
    {
        return [
            'User Name',
            'User Email',
            'Appointment Date',
            'Appointment Time',
            'Request Date',
            'Status',
            'Admin Notes',
        ];
    }

    // Memetakan setiap baris data ke kolom yang sesuai
    public function map($appointment): array
    {
        return [
            $appointment->user->name,
            $appointment->user->email,
            \Carbon\Carbon::parse($appointment->appointment_date)->format('d F Y'),
            \Carbon\Carbon::parse($appointment->appointment_time)->format('H:i'),
            $appointment->created_at->format('d F Y'),
            $appointment->status,
            $appointment->admin_notes,
        ];
    }
}