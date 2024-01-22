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
        $jobs = Job::query();

        $jobs = $jobs->when(request('search'), function ($q, $search) {
            // to change the operator precedence so that the query will be:
            // select * from `jobs` where (`title` like '%search%' or `description` like '%search%') and `salary` >= 'min_salary' and `salary` <= 'max_salary'
            $q->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
            });
        })->when(request('min_salary'), function($q, $min_salary) {
            $q->where('salary', '>=', $min_salary);
        })->when(request('max_salary'), function($q, $max_salary) {
            $q->where('salary', '<=', $max_salary);
        });

        $jobs = $jobs->get();
        return view('jobs.index', compact(['jobs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact(['job'] ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
