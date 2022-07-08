<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserWorkExperienceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'company_name' => 'required',
            'job_title' => 'required',
            'date_from' => 'required',
            'date_to' => $request->get('is_current') ? '' : 'required',
            'summary' => 'required',
            'is_current' => 'required',
        ]);

        $params[] = [
            'user_id' => $request->user()->id,
        ];

        WorkExperience::create($params);

        return Inertia::location(route('dashboard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkExperience $workExperience)
    {
        $params = $request->validate([
            'company_name' => 'required',
            'job_title' => 'required',
            'date_from' => 'required',
            'date_to' => $request->get('is_current') ? '' : 'required',
            'summary' => 'required',
            'is_current' => 'required',
        ]);

        $workExperience->update($params);

        return Inertia::location(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, WorkExperience $workExperience)
    {
        $workExperience->delete();

        return Inertia::location(route('dashboard'));
    }
}
