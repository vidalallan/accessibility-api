<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Issue;
use App\Models\Device;
use App\Models\Pattern;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::all();        

        return $issues;
    }

    public function indexView(){
        $issues = $this->index();
        $devices = Device::all();
        $patterns = Pattern::all();

        return view('issue.index', compact('issues', 'devices','patterns'));        
    }

    public function countIssue(){
        $issue = new Issue();
        
        return response()->json([
            'count'=> $issue::count(),
            'code'=>200]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $issue = new Issue();
        
        $issue -> creationDate = date('Y-m-d');
        $issue -> deleted = 0;
        $issue -> title = $request-> title;
        $issue -> description = $request-> description;
        $issue -> appFieldId = $request->appFieldId;
        $issue -> appFieldName = $request->appFieldName;

        $image = $request->file('printScreen');
        $path = $image->store('images','public');

        $issue -> printScreen = $path;

        $issue -> idDevice = $request-> idDevice;

        $issue -> idPattern = $request-> idPattern;
        $issue -> patternVersion = $request-> patternVersion;
        $issue -> patternVersionDetailts = $request-> patternVersionDetailts;

        $issue -> devideModel = $request-> devideModel;        
        $issue -> version = $request-> version;
        $issue -> appTitle = $request-> appTitle;
        $issue -> linkApp = $request-> linkApp;  
        
        $issue -> origin = $request-> origin;

        $issue ->save();
    }


    public function storeView(Request $request)
    {
        $issue = new Issue();
        
        $issue -> creationDate = date('Y-m-d');
        $issue -> deleted = 0;
        $issue -> title = $request-> title;
        $issue -> description = $request-> description;
        $issue -> appFieldId = $request->appFieldId;
        $issue -> appFieldName = $request->appFieldName;

        //$issue -> printScreen = $request-> printScreen;
        $image = $request->file('printScreen');
        $path = $image->store('images','public');

        $issue -> printScreen = $path;

        $issue -> idPattern = $request-> idPattern;
        $issue -> patternVersion = $request-> patternVersion;
        $issue -> patternVersionDetailts = $request-> patternVersionDetailts;

        $issue -> idDevice = $request-> idDevice;
        $issue -> devideModel = $request-> devideModel;        
        $issue -> version = $request-> version;
        $issue -> appTitle = $request-> appTitle;
        $issue -> linkApp = $request-> linkApp;

        $issue -> origin = "web";

        //'appFieldId','appFieldName','devideModel'

        $issue ->save();

        return redirect('/questao');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
