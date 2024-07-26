<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselorTask extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'start_date',
        'end_date',
        'description',
        'status'
    ];

}
