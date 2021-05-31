<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\IncidentResource;
use App\Models\Incident;
use App\Models\Location;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $incidents = Incident::find(1)->peoples;
        $incidents = Incident::with('peoples')->with('locations')->get();
        return response([ 'incidents' => IncidentResource::collection($incidents), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data = isset($data['data'][0]) ? $data['data'][0] : $data;

        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'incidentDate' => 'required',
            'comments'=>'nullable'
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        // dd($data['people']);
        if(!isset($data['location'])){
            return response(['error' => 'Location is invalid', 'Validation Error']);
        }
        $incident = Incident::create($data);
        $id = $incident['id'];
        $location = array('incident_id'=>$id,'latitude'=>$data['location']['latitude'],'longitude'=>$data['location']['longitude']);
        Location::create($location);

        if(isset($data['people'])){
            foreach($data['people'] as $people){
                $people = array('incident_id'=>$id,'name'=>$people['name'],'type'=>$people['type']);
                People::create($people);
            }
        }

        return response([ 'incident' => new IncidentResource($incident), 'message' => 'Created successfully'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function show(incident $incident)
    {
        return response([ 'incident' => new IncidentResource($incident), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, incident $incident)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\incident  $incident
     * @return \Illuminate\Http\Response
     */
    public function destroy(incident $incident)
    {
        //
    }
}
