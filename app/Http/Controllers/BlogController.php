<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class BlogController extends Controller
{
    public function edit(Request $request) 
    {

        $team = Team::find($request->user()->currentTeam->id);
        $user = auth()->user();

        if (!$user->hasTeamPermission($team, 'update') || ($user->currentTeam->id != $team->id)) {
            return response()->json(['error'=>'Ban khong co quyen edit'],401);
        }
        return "Edit blog";
    }

    public function show(Request $request) 
    {

        $team = Team::find($request->user()->currentTeam->id);
        $user = auth()->user();

        if (!$user->hasTeamPermission($team, 'read')) {
            return response()->json(['error'=>'Ban khong co quyen xem'],401);
        }

        return "show blog";
    }

    public function delete(Request $request) {

        $team = Team::find($request->user()->currentTeam->id);
        $user = auth()->user();

        if (!$user->hasTeamPermission($team, 'delete')) {
            return response()->json(['error'=>'Ban khong co quyen delete'],401);
        }

        return "Delete blog";
    }
}
