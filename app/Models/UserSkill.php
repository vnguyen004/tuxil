<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserSkill extends Pivot
{
    use HasFactory;

    protected $table = 'user_skills';

    protected $fillable = [
        'description',
        'skill_since',
    ];

    protected $casts = [
        'skill_since' => 'date',
    ];

    public function setSkillSince($since)
    {
        $this->attributes['skill_since'] = Carbon::parse($since);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function skill()
    {
        return $this->belongsToMany(Skill::class);
    }
}
