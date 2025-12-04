<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    protected $fillable = [
        'karier_id',
        'name',
        'email',
        'phone',
        'resume_path',
        'experience',
        'notice_period',
        'vacancy_source',
        'motivation',
        'terms_accepted',
        'status',
    ];
    
    protected $casts = [
        'terms_accepted' => 'boolean',
    ];

    public function karier()
    {
        return $this->belongsTo(Karier::class);
    }

    /**
     * Get the URL to the resume file.
     *
     * @return string
     */
    public function getResumeUrlAttribute()
    {
        return $this->resume_path ? asset('storage/' . $this->resume_path) : null;
    }
}
