<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CombinedUsersExport implements WithMultipleSheets
{
    protected $filters;

    // Terima filter dari controller
    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        // Daftarkan semua sheet yang ingin Anda gabungkan
        $sheets = [
            'Users Summary' => new UsersExport($this->filters),
            'Questionnaires Data' => new QuestionnairesExport($this->filters),
        ];

        return $sheets;
    }
}
