<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->appliedJobs()->with([
            'job' => fn($query) => $query->withCount('applicants')->withAvg('applicants', 'expected_salary'),
            'job.company'
        ])->latest()->get();
        return view('my-job-applications.index', compact('applications'));
    }

    public function destroy(JobApplicant $my_job_application)
    {
        $my_job_application->delete();

        return redirect()->route('my-job-applications.index');
    }
}
