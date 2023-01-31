<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $assessment = Assessment::where('idIssue', $request->id)
                                ->where('problem',$request->problem)    
                                ->get();
        return $assessment;    
    }

    public function countYesNoIdIssue(){        

        $sql = 'SELECT i.idIssue, i.title, i.idDevice, d.device,';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';
        $sql .= 'count(i.idIssue) "total"';
        $sql .= 'from tbassessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.idIssue = i.idIssue ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'group by a.idIssue';

        $assessment = DB::select($sql);

        return $assessment;
    }

    public function countYesNoByIdIssue(Request $request){        

        $sql = 'SELECT i.idIssue, i.title, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.idIssue) "total"';
        $sql .= 'from tbassessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.idIssue = i.idIssue ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where a.idIssue = ' . $request->id_issue;
        $sql .= ' group by a.idIssue';

        $assessment = DB::select($sql);

        return $assessment;
    }


    public function countYesNoByIdDevice(Request $request){        

        $sql = 'SELECT i.idIssue, i.title, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.idIssue) "total"';
        $sql .= 'from tbassessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.idIssue = i.idIssue ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where i.idDevice = ' . $request->id_device;
        $sql .= ' group by a.idIssue';

        $assessment = DB::select($sql);

        return $assessment;
    }

    public function countYesNoByDevice(Request $request){        

        $sql = 'SELECT i.idIssue, i.title, i.idDevice, d.device, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.idIssue) "total"';
        $sql .= 'from tbassessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.idIssue = i.idIssue ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where d.device = ' . $request->device;
        $sql .= ' group by a.idIssue';

        $assessment = DB::select($sql);

        return $assessment;
    }

    public function countYesNoByDeviceModel(Request $request){        

        $sql = 'SELECT i.idIssue, i.title, i.idDevice, d.device, i.devideModel, ';
        $sql .= 'SUM(case WHEN(a.problem=1)THEN 1 ELSE 0 END) AS "yes", ';
        $sql .= 'SUM(case when(a.problem=0)THEN 1 ELSE 0 END) AS "no", ';        
        $sql .= 'count(i.idIssue) "total"';
        $sql .= 'from tbassessment a ';
        $sql .= 'inner join tbissue i ';
        $sql .= 'on a.idIssue = i.idIssue ';
        $sql .= 'inner join tbDevice d ';
        $sql .= 'on i.idDevice = d.idDevice ';
        $sql .= 'where i.devideModel = ' . $request->device_model;
        $sql .= ' group by a.idIssue';

        $assessment = DB::select($sql);

        return $assessment;
    }

}
