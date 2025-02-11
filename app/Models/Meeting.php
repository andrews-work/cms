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
        'client_id',
        'duration',
        'description',
        'notes',
        'files',
    ];

    public function User()
    {
        return $this->belongsTo((User::class));
    }

    // to attach client to meetings
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
