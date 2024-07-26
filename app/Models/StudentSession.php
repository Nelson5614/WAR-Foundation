<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'name',
        'surname',
        'email',
        'phone',
        'address',
        'description',
        'date',

    ];
}
