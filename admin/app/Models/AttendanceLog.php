<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'teacher_id',
        'uid',
        'user_id',
        'state',
        'timestamp',
        'type',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
