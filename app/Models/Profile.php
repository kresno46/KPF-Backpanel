<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'content',
        'site_name',
        'description',
        'address',
        'map_link',
        'complaint_link',
        'phone',
        'fax',
        'email',
    ];
}
