<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function trackVisit($external_id)
    {
        Visitor::firstOrCreate(['external_id' => $external_id]);
        return response()->json(['Vistor Tracked Successfully'], 200);
    }

    public function updateStage(Request $request)
    {
        $request->validate([
            'external_id' => 'required|string',
            'stage' => 'required|string|in:visited,viewed_page,searched',
        ]);

        $visit = Visitor::where('external_id', $request->external_id)->first();
        if ($visit) {
            $visit->stage = $request->stage;
            $visit->save();
        }

        return response()->json(['Stage updated successfully'], 200);
    }
}