<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tasks;

class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'difficulties',
        'next_plan',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
