<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workspace extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'datetime',
        'status',
        'uuid',
        'attachment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function task()
    {
        return $this->hasMany(Task::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
