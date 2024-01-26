<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class BeEmployerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Company::class);
    }
    public function create()
    {
        return view('employer.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|unique:companies,name'
        ]);


        auth()->user()->company()->create(['name' => $data['company_name']]);
        return redirect()->route('jobs.index')->with('success', 'you\'re registered as an employer successfully.');
    }
}
