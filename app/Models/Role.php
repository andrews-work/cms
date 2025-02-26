<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    // tables
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function users()
    {
        return $this -> belongsToMany(User::class, 'user_role');
    }

    public function scopeClient($query)
    {
        return $query->where('name', 'client');
    }

    public function scopeEmployss($query)
    {
        return $query->where('name', 'employee');
    }

    public function scopeAdmin($query)
    {
        return $query->where('name', 'admin');
    }

}
