<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'job_title',
        'date_from',
        'date_to',
        'is_current',
        'summary',
    ];

    protected $casts = [
        'is_current' => 'boolean',
        'date_from' => 'date',
        'date_to' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
