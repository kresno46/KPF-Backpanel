<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Karier extends Model
{
    protected $table = 'kariers';
    
    protected $fillable = [
        'nama_kota',
        'posisi',
        'slug',
        'responsibilities',
        'qualifications',
        'email',
    ];

    /**
     * Get the career applications for the job.
     */
    public function applications()
    {
        return $this->hasMany(CareerApplication::class, 'karier_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($karier) {
            $karier->slug = Str::slug($karier->nama_kota . ' ' . $karier->posisi);
        });

        static::updating(function ($karier) {
            $karier->slug = Str::slug($karier->nama_kota . ' ' . $karier->posisi);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
