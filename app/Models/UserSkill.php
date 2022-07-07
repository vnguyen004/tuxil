<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserSkill extends Pivot
{
    use HasFactory;

    protected $table = 'user_skills';

    protected $fillable = [
        'desc',
    ];

    protected $casts = [
        'since' => 'date',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }
}
