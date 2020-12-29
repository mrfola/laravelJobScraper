<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function User_Jobs()
    {
       return $this->hasMany(User_Job::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
