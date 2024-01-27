<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = auth()->user()->company->jobs;
        return view('my-jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my-jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'location' => 'required|string|min:2|max:255',
            'salary' => 'required|integer|numeric|min:1|max:1000000',
            'description' => 'nullable|string|min:100',
            'experience' => 'required|in:' . implode(',', Job::$experiences),
            'category' => 'required|in:' . implode(',', Job::$categories),
        ]);

        auth()->user()->company->jobs()->create($data);

        return redirect()->route('my-jobs.index')->with('success', 'job posted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
