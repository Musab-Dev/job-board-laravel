<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        return view('jobs.applications.create', compact(['job']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {
        $request->validate(['expected_salary' => 'required|integer|min:1|max:1000000']);

        $job->applicants()->create([
            'job_id' => $job->id,
            'applicant_id' => auth()->user()->id,
            'expected_salary' => $request->expected_salary,
        ]);

        return redirect()->route('jobs.show', compact(['job']))
            ->with('success', 'your application submitted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
