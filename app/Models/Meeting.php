<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'meeting_date',
        'meeting_time',
        'duration',
        'description',
        'notes',
        'files',
    ];

    public function User()
    {
        return $this->belongsToMany((User::class));
    }
}
