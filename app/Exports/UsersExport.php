<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class UsersExport implements FromQuery, WithHeadings, WithMapping
{
    protected $filters;

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function query()
    {
        $query = User::with('questionnaire')->where('role', 'customer');

        // Apply the same filters from your controller
        $query->when($this->filters['search'] ?? null, function ($q, $search) {
            return $q->where(function ($subQuery) use ($search) {
                $subQuery->where('name', 'like', "%{$search}%")
                    ->orWhere('nickname', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        });
        $query->when($this->filters['gender'] ?? null, function ($q, $gender) {
            return $q->where('gender', $gender);
        });
        $query->when($this->filters['created_from'] ?? null, function ($q, $date) {
            return $q->whereDate('created_at', '>=', $date);
        });
        $query->when($this->filters['created_to'] ?? null, function ($q, $date) {
            return $q->whereDate('created_at', '<=', $date);
        });

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Nickname',
            'Email',
            'Gender',
            'Date of Birth',
            'Age',
            'Phone Number',
            'Occupation',
            'Income',
            'Registered At',
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->nickname,
            $user->email,
            ucfirst($user->gender),
            $user->dob,
            $user->dob ? Carbon::parse($user->dob)->age : '-',
            $user->mobile_phone,
            ucfirst($user->questionnaire?->occupation),
            $user->questionnaire?->income,
            $user->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
