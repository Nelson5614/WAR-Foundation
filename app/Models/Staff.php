<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'phone',
        'email',
        'department',
        'photo',
        'bio'
    ];

    /**
     * Get the user associated with the staff member.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the URL for the staff member's photo.
     *
     * @return string
     */
    public function getPhotoUrlAttribute()
    {
        if (strpos($this->photo, 'http') === 0) {
            return $this->photo;
        }
        
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        
        return asset('assets/images/team/default.png');
    }
}
