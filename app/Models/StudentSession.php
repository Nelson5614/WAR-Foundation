<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSession extends Model
{
    use HasFactory;

    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'like', "%{$term}%")
                     ->orWhere('email', 'like', "%{$term}%");
    }

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
