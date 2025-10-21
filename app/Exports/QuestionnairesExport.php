<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class QuestionnairesExport implements FromQuery, WithHeadings, WithMapping
{
    protected $filters;

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    public function query()
    {
        // Start by querying users based on the filters, just like in the controller
        $query = User::with('questionnaire')->where('role', 'customer');

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
        // Define all the column headers for your questionnaire data
        return [
            'User ID',
            'User Name',
            'Height',
            'Partner Height',
            'Religion',
            'Partner Religion',
            'Ethnicity',
            'Partner Ethnicity',
            'Marital Status',
            'Partner Marital Status',
            'Education',
            'Partner Education',
            'Occupation',
            'Partner Occupation',
            'Income',
            'Partner Income',
            'Last School',
            'Company',
            'Job Position',
            'Social Media',
            'Description',
            'Partner Description',
            'Partner Priority',
            'Referral Code'
        ];
    }

    public function map($user): array
    {
        // Map the user and their questionnaire data to the columns
        $questionnaire = $user->questionnaire;

        return [
            $user->id,
            $user->name,
            $questionnaire?->height,
            $questionnaire?->partner_height,
            $questionnaire?->religion,
            $questionnaire?->partner_religion,
            $questionnaire?->ethnicity,
            $questionnaire?->partner_ethnicity,
            $questionnaire?->marital_status,
            $questionnaire?->partner_marital_status,
            $questionnaire?->education,
            $questionnaire?->partner_education,
            $questionnaire?->occupation,
            $questionnaire?->partner_occupation,
            $questionnaire?->income,
            $questionnaire?->partner_income,
            $questionnaire?->last_school,
            $questionnaire?->company,
            $questionnaire?->job_position,
            $questionnaire?->social_media,
            $questionnaire?->description,
            $questionnaire?->partner_description,
            $questionnaire?->partner_priority,
            $questionnaire?->referral_code,
        ];
    }
}
