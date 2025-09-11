<?php

namespace App\Models;

use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use HasRoles;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    // Role constants
    public const ROLE_ADMIN = 'admin';
    public const ROLE_COUNSELOR = 'counselor';
    public const ROLE_STUDENT = 'student';
    public const ROLE_STAFF = 'staff';

    /**
     * Get the sessions where the user is a student.
     */
    public function studentSessions()
    {
        return $this->hasMany(StudentSession::class, 'student_id');
    }
    
    /**
     * Get the sessions where the user is a counselor.
     */
    public function counselorSessions()
    {
        return $this->hasMany(StudentSession::class, 'counselor_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'license_number',
        'phone',
        'date_of_birth',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'date',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Check if user is an admin
     */
    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    /**
     * Check if user is a counselor
     */
    public function isCounselor(): bool
    {
        return $this->role === self::ROLE_COUNSELOR;
    }

    /**
     * Check if user is a student
     */
    public function isStudent(): bool
    {
        return $this->role === self::ROLE_STUDENT;
    }

    /**
     * Check if user is a staff member
     */
    public function isStaff(): bool
    {
        return $this->role === self::ROLE_STAFF;
    }
}
