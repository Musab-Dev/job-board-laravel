<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAnyForEmployer', Job::class);

        $jobs = auth()->user()->company->jobs()->with(['company', 'applicants', 'applicants.applicant'])->latest()->get();
        return view('my-jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Job::class);

        return view('my-jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {
        $this->authorize('create', Job::class);

        auth()->user()->company->jobs()->create($request->validated());

        return redirect()->route('my-jobs.index')->with('success', 'job posted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $myJob)
    {
        $this->authorize('update', $myJob);

        return view('my-jobs.edit', ['job' => $myJob]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $myJob)
    {
        $this->authorize('update', $myJob);

        $myJob->update($request->validated());

        return redirect()->route('my-jobs.index')->with('success', 'Job post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $myJob)
    {
        $this->authorize('delete', $myJob);

        $myJob->delete();
        return redirect()->route('my-jobs.index')->with('success', 'Job post deleted successfully');
    }
}
