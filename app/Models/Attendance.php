<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'teacher_id',
        'student_id',
        'attendence_date',
        'attendence_status'
    ];

    public function student() {
        return $this->belongsTo(Pupil::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function class() {
        return $this->belongsTo(Classes::class);
    }

}
