<?php

namespace App\Http\Controllers;

use App\Models\References;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * User dashboard index.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Dashboard/Show', [
            'skills' => collect($request->user()->skills)->map(function (Skill $skill) {
                return [
                    'id' => $skill->id,
                    'name' => $skill->name,
                    'description' => $skill->pivot->description,
                    'skill_since' => $skill->pivot->skill_since->longAbsoluteDiffForHumans(),
                ];
            }),

            'workExperiences' => collect($request->user()->workExperiences)->map(function (WorkExperience $workExperience) {
                return [
                    'id' => $workExperience->id,
                    'company_name' => $workExperience->company_name,
                    'job_title' => $workExperience->job_title,
                    'date_from' => $workExperience->date_from->format('M Y'),
                    'date_to' => $workExperience->date_to?->format('M Y'),
                    'summary' => $workExperience->summary,
                    'is_current' => $workExperience->is_current,
                ];
            }),

            'references' => collect($request->user()->references)->map(function (References $reference) {
                return [
                    'id' => $reference->id,
                    'full_name' => $reference->full_name,
                    'email_address' => $reference->email_address,
                    'phone_number' => $reference->phone_number,
                ];
            }),
        ]);
    }
}
