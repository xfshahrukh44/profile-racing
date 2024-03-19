<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_id',
        'first_name',
        'last_name',
        'email',
        'url',
        'cover_letter',
        'resume',
    ];

    public function job ()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
