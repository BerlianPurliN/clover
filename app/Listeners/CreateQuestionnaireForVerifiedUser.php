<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Verified;
use App\Models\Questionnaire;

class CreateQuestionnaireForVerifiedUser
{
    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        $user = $event->user;

        // Cek jika user belum punya kuesioner, baru buatkan.
        if (!$user->questionnaire) {
            // Pastikan Anda mengirimkan 'user_id' di sini
            Questionnaire::create([
                'user_id' => $user->id,
            ]);
        }
    }
}
