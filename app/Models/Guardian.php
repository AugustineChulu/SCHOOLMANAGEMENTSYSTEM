<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $table = 'guardians';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'phone',
        'current_address',
        'permanent_address',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function children()
    // {
    //     return $this->hasMany(Pupil::class, 'guardian_id');
    // }

}
