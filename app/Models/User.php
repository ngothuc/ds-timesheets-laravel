<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Timesheet;

class User extends Model
{
    use HasFactory;

    public function timesheets() {
        return $this->hasMany(Timesheet::class);   
    }

}
