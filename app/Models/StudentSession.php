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
        'counselor_id',
        'name',
        'surname',
        'email',
        'phone',
        'address',
        'title',
        'description',
        'date',
        'start_time',
        'duration',
        'end_time',
        'is_online',
        'status',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'is_online' => 'boolean',
    ];
    
    
    /**
     * Get the student associated with the session.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    
    /**
     * Get the counselor associated with the session.
     */
    public function counselor()
    {
        return $this->belongsTo(User::class, 'counselor_id');
    }
}
