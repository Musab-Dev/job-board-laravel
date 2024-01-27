<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Job::class);

        $filters = request()->only(['search', 'min_salary', 'max_salary', 'experience', 'category']);

        $jobs = Job::with('company')->filter($filters)->get();
        return view('jobs.index', compact(['jobs']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $this->authorize('view', $job);

        $job = $job->load('company');
        $companyOtherJobs = $job->company->jobs()->where('id', '!=', $job->id)->get();
        return view('jobs.show', compact(['job', 'companyOtherJobs']));
    }

}
