<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();

        return $devices;

        /*
        foreach($devices as $device){
            echo $device ->idDevice . " ";
            echo $device ->device . "<br />";
        }
        */
    }


    public function indexView(){
        $devices = $this->index();
        return view('device.index')->with('devices',$devices);
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
        $device = new Device();
        $device->device = $request->device;
        $device ->save();
        
        
    }

    public function storeView(Request $request){

        $device = new Device();
        $device->device = $request->device;
        $device ->save();

        return redirect('/dispositivo');

    }

    public function countDevice(){
        $device = new Device();
        
        return response()->json([
            'count'=> $device::count(),
            'code'=>200]);
    }

    public static function  countDeviceView(){
        $device = new Device();

        $total = $device::count();
        
        return $total;               
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
        $device = Device::where('idDevice',$id)->delete();
        
        return response()->json([
            'message'=> "Device removed",
            'code'=>200]);
    }

    public function destroyView($id)
    {
        $device = Device::where('idDevice',$id)->delete();
        return redirect('/dispositivo'); 
    }
}
