<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class QuestionnaireController extends Controller
{
    /**
     * Menampilkan halaman formulir kuesioner.
     */
    public function index()
    {

        $questionnaire = Auth::user()->questionnaire;

        $allPriorities = [
            'work' => 'Work',
            'salary' => 'Salary',
            'appearance' => 'Appearance',
            'education' => 'Education',
            'religion' => 'Religion',
            'personality' => 'Personality',
            'lifestyle' => 'Lifestyle',
            'culture' => 'Culture',
        ];
        $savedOrder = $questionnaire->partner_priority ? explode(',', $questionnaire->partner_priority) : [];

        $sortedPriorities = [];
        if (!empty($savedOrder)) {
            foreach ($savedOrder as $key) {
                if (isset($allPriorities[$key])) {
                    $sortedPriorities[$key] = $allPriorities[$key];
                }
            }
            $sortedPriorities += $allPriorities;
        } else {
            $sortedPriorities = $allPriorities;
        }


        return view('pages.dashboard.customer.questionnaire.index', compact('questionnaire', 'sortedPriorities'));
    }

    /**
     * Menyimpan data baru dari formulir kuesioner.
     */
    public function update(Request $request)
    {

        // dd($request->all());

        $validatedData = $request->validate([
            'height' => 'nullable|integer',
            'partner_height' => 'nullable|integer',
            'religion' => 'nullable|string|max:255',
            'partner_religion' => 'nullable|string|max:255',
            'ethnicity' => 'nullable|string|max:255',
            'partner_ethnicity' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string|max:255',
            'partner_marital_status' => 'nullable|string|max:255',
            'education' => 'nullable|string|max:255',
            'partner_education' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'partner_occupation' => 'nullable|string|max:255',
            'income' => 'nullable|string|max:255',
            'partner_income' => 'nullable|string|max:255',
            'personality' => 'nullable|string|max:255',
            'partner_personality' => 'nullable|string|max:255',
            'hobby' => 'nullable|string|max:255',
            'last_school' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'job_position' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'partner_description' => 'nullable|string',
            'partner_priority' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|max:2048',
            'business_card' => 'nullable|image|max:2048',
            'referral_code' => 'nullable|string|max:255',

        ]);

        $user = Auth::user();
        $questionnaire = $user->questionnaire;

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }

        if ($request->hasFile('business_card')) {
            if ($questionnaire->business_card) {
                Storage::disk('public')->delete($questionnaire->business_card);
            }
            $path = $request->file('business_card')->store('business_cards', 'public');
            $validatedData['business_card'] = $path;
        }

        unset($validatedData['profile_picture']);

        $questionnaire->update($validatedData);

        if (!$user->questionnaire_completed_at) {
            $user->questionnaire_completed_at = now();
        }
        $user->save();

        
        return redirect()->route('customer.dashboard')->with('status', 'Questionnaire updated successfully!');
    }
}
