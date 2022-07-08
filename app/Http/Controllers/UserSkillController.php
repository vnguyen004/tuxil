<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class UserSkillController extends Controller
{
    /**
     * Store user skill relationship.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'name' => 'required',
            'skill_since' => 'required',
            'description' => 'required',
        ]);

        $skill = Skill::updateOrCreate([
            'name' => $params['name'],
        ]);

        $request->user()->skills()->attach($skill->id, [
            'skill_since' => $params['skill_since'],
            'description' => $params['description'],
        ]);

        return redirect()->action([DashboardController::class, 'index']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $params = $request->validate([
            'skill_since' => 'required',
            'description' => 'required',
        ]);

        $request->user()->skills()->updateExisitingPivot($skill->id, $params);

        return redirect()->action([DashboardController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Skill $skill)
    {
        $request->user()->skills()->detach($skill);

        return redirect()->action([DashboardController::class, 'index']);
    }
}
