<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Definiranje veza između modela Project i User
    public function teamMembers()
    {
        return $this->belongsToMany(User::class, 'project_user');
    }

    public function leader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}