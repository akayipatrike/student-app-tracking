<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    // Define the fillable attributes if needed
    protected $fillable = [
        'student_id',
        'grade_id',
        'date',
        'status',
        'reason',
    ];

    // Define relationships if necessary
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
