<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUniqueVisitors = Visitor::distinct('external_id')->count();
        $totalVisitorsByStage = Visitor::select('stage', \DB::raw('count(*) as total'))->groupBy('stage')->get();

        return view('dashboard', compact('totalUniqueVisitors', 'totalVisitorsByStage'));
    }
}