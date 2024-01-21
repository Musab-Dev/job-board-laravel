<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public static array $experiences = ['junior', 'intermediate', 'senior'];
    public static array $categories = ['IT', 'Finance', 'Markiting', 'Design', 'Sales', 'HR'];

}
