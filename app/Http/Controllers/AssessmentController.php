<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Assessment;

class AssessmentController extends Controller
{
    
    public function index()
    {
        $assessment = Assessment::all();
        return $assessment;
    }

    public function store(Request $request)
    {
        $assessment = new Assessment();
        $assessment -> creationDate = date('Y-m-d');
        $assessment -> deleted = 0;
	    $assessment -> idIssue = $request -> idIssue;
	    $assessment -> problem = $request -> problem;
	    $assessment -> justification = $request -> justification;

        $assessment -> save();        
    }

    public function showIdIssue(Request $request)
    {
        $assessment = Assessment::where('idIssue', $request->id)->get();
        return $assessment;
    }

    public function showIdIssueProblem(Request $request)
    {
        $assessment = Assessment::where('idIssue', $request->id)->get();
        return $assessment;
    }

}
