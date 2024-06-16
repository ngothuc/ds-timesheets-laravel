<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Timesheet;

class Task extends Model
{
    use HasFactory;

    public function timesheet() {
        return $this->belongsTo(Timesheet::class);
    }
}
