<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:5|max:255',
            'location' => 'required|string|min:2|max:255',
            'salary' => 'required|integer|numeric|min:1|max:1000000',
            'description' => 'required|string|min:50',
            'experience' => 'required|in:' . implode(',', Job::$experiences),
            'category' => 'required|in:' . implode(',', Job::$categories),
        ];
    }
}
