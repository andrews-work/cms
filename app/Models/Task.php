<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'note',
        'due_date',   // Fix the column name
        'category',   // personal | business
        'client',     // Attach client (nullable)
        'docs',       // Attach docs (nullable)
        'tag',
        'url',        // Attach a URL (nullable)
    ];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class); // Belongs to one user
    }

}
