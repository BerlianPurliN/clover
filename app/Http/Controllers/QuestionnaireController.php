<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire; // Impor model Questionnaire
use Illuminate\Support\Facades\Auth; // Impor Auth

class QuestionnaireController extends Controller
{
    /**
     * Menampilkan halaman formulir kuesioner.
     */
    public function index()
    {
        return view('pages.dashboard.customer.questionnaire.index');
    }

    /**
     * Menyimpan data baru dari formulir kuesioner.
     */
    public function store(Request $request)
    {
        // 1. Validasi data yang masuk dari form
        // (Kita akan lengkapi validasinya nanti)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'mobile_phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'gender' => 'nullable|string|max:50',
            'dob' => 'nullable|date',
            'height' => 'nullable|integer|min:50|max:300',
            'nationality' => 'nullable|string|max:100',
            'religion' => 'nullable|string|max:100',
            'current_city' => 'nullable|string|max:100',
            'marital_status' => 'nullable|string|max:50',
            'company_name' => 'nullable|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'income' => 'nullable|string|max:100',
            'business_card_path' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:100',
            'school_name' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:100',
            'recent_photos_path' => 'nullable|string|max:255',
            'partner_preferences' => 'nullable|string',
            'social_media' => 'nullable|string|max:255',
            'about_self' => 'nullable|string',
            'about_partner' => 'nullable|string',
            'referrer' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
        ]);

        // 2. Tambahkan user_id dari user yang sedang login
        $validatedData['user_id'] = Auth::id();

        // 3. Simpan data ke database menggunakan model Questionnaire
        Questionnaire::create($validatedData);

        // 4. Arahkan pengguna ke halaman lain dengan pesan sukses
        // Misalnya, kembali ke dashboard
        return redirect()->route('customer.dashboard')->with('status', 'Questionnaire submitted successfully!');
    }
}
