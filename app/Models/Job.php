<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $experiences = ['junior', 'intermediate', 'senior'];
    public static array $categories = ['IT', 'Finance', 'Markiting', 'Design', 'Sales', 'HR'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function applicants(): HasMany
    {
        return $this->hasMany(JobApplicant::class);
    }

    public function scopeFilter(EloquentBuilder|QueryBuilder $query, array $filters): EloquentBuilder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function ($q, $search) {
            // to change the operator precedence so that the query will be:
            // select * from `jobs` where (`title` like '%search%' or `description` like '%search%') and `salary` >= 'min_salary' and `salary` <= 'max_salary'
            $q->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    /* To search in nested relation we use whereHas|orWhereHas */
                    ->orWhereHas('company', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            });
        })->when($filters['min_salary'] ?? null, function ($q, $min_salary) {
            $q->where('salary', '>=', $min_salary);
        })->when($filters['max_salary'] ?? null, function ($q, $max_salary) {
            $q->where('salary', '<=', $max_salary);
        })->when($filters['experience'] ?? null, function ($q, $experience) {
            $q->where('experience', $experience);
        })->when($filters['category'] ?? null, function ($q, $category) {
            $q->where('category', $category);
        });
        ;
    }

}
