<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email_address',
        'phone_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
