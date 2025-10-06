<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Questionnaire extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile_phone',
        'email',
        'gender',
        'dob',
        'height',
        'nationality',
        'religion',
        'current_city',
        'marital_status',
        'company_name',
        'job_title',
        'income',
        'business_card_path',
        'education',
        'school_name',
        'major',
        'recent_photos_path',
        'partner_preferences',
        'social_media',
        'about_self',
        'about_partner',
        'referrer',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
