<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'employer_id');
    }

    public function appliedJobs(): HasMany
    {
        // to escap the defaults, specify the foreign key name as second parameter  
        return $this->hasMany(JobApplicant::class, 'applicant_id');
    }

    public function isAppliedToJob(Job|int $job): bool
    {
        return $this->where('id', $this->id)
            ->whereHas('appliedJobs', fn($query) => $query->where('job_id', $job->id ?? $job))
            ->exists();
    }

}
