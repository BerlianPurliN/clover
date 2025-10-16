<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Questionnaire extends Model
{

    use LogsActivity;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'height',
        'partner_height',
        'religion',
        'partner_religion',
        'ethnicity',
        'partner_ethnicity',
        'marital_status',
        'partner_marital_status',
        'education',
        'partner_education',
        'occupation',
        'partner_occupation',
        'income',
        'partner_income',
        'personality',
        'partner_personality',
        'hobby',
        'last_school',
        'company',
        'job_position',
        'social_media',
        'description',
        'partner_description',
        'partner_priority',
        'business_card' ,
        'referral_code',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->setDescriptionForEvent(fn(string $eventName) => "Questionnaire has been {$eventName}")
            ->logOnlyDirty(); // Hanya catat jika ada perubahan
    }
}
