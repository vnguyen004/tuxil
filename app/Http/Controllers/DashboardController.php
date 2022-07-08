<?php

namespace App\Http\Controllers;

use App\Models\Skill;
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
        ]);
    }
}
