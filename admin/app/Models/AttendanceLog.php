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
        'name',
        'state',
        'timestamp',
        'clock_in',
        'clock_out'
    ];


    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'user_id');
    }
    
    protected $casts = [
        'timestamp' => 'datetime',
        'clock_in' => 'datetime',
        'clock_out' => 'datetime',
    ];
    
}
