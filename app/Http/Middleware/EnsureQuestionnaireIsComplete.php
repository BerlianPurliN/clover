<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureQuestionnaireIsComplete
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika:
        // 1. Pengguna sudah login DAN
        // 2. Kolom 'questionnaire_completed_at' masih KOSONG (null) DAN
        // 3. Pengguna TIDAK sedang mencoba mengakses halaman kuesioner itu sendiri (untuk mencegah redirect loop)
        if ($request->user() &&
            is_null($request->user()->questionnaire_completed_at) &&
            !$request->routeIs('questionnaire.*')) // Menggunakan 'questionnaire.*' untuk mencakup semua rute kuesioner
        {                                   
            // Jika semua kondisi terpenuhi, paksa redirect ke halaman kuesioner
            return redirect()->route('questionnaire.index');
        }

        // Jika kuesioner sudah selesai, atau jika pengguna sedang di halaman kuesioner, izinkan akses.
        return $next($request);
    }
}
