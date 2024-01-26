<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
