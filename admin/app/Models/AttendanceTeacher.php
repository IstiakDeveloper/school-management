<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceTeacher extends Model
{
    use HasFactory;
    public $timestamps = false; 
    

    protected $fillable = [
        'teacher_id',
        'date',
        'uid',
        'user_id',
        'name',
        'state',
        'timestamp',
        'clock_in',
        'clock_out',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    

    public function calculateState($clockIn, $clockOut)
    {
        // Fetch the TimeStampTeacher record for the specific teacher
        $timestampTeacher = TimeStampTeacher::where('teacher_id', $this->teacher_id)->first();

        // Use the clock_in and clock_out times from TimeStampTeacher model
        $expectedClockIn = $timestampTeacher->clock_in ?? '09:00:00';
        $expectedClockOut = $timestampTeacher->clock_out ?? '12:00:00';

        if ($clockIn > $expectedClockIn) {
            return 'late';
        } elseif ($clockOut < $expectedClockOut) {
            return 'early_leave';
        }

        return 'on_time';
    }

}
