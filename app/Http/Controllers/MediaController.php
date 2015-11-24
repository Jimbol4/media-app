<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\MediaType;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\MediaRequest;

class MediaController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media = Media::where('user_id', '=', \Auth::user()->id)->get();
        
        //dd($media);
        
        return view('media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request)
    {
        $type_id = $this->checkType($request->input('type_id'));
        
        if (!$type_id) {
            \Flash::error('Invalid type. Please enter in a text name.');
            return redirect()->back();
        }
        
        $request['type_id'] = $type_id;
        
        $request->user()->media()->create($request->all());
        
        \Flash::success('New media successfully added');
        
        return redirect('media');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {   
        return view('media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MediaRequest $request, Media $media)
    {
        
        $type_id = $this->checkType($request->input('type_id'));
        
        if (!$type_id) {
            \Flash::error('Invalid type. Please enter in a text name.');
            return redirect()->back();
        }
        
        $request['type_id'] = $type_id; 
        
        $media->update($request->all());
        
        \Flash::success('Media successfully updated');
        
        return redirect('media');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($media)
    {
        $media->delete();
        
        \Flash::success('Media successfully deleted');
        
        return redirect('media');
    }
    
    protected function checkType($type_id) {
        
        // if the submitted type id is an integer, check it exists and return it.
        // If it doesn't exist, return false (don't let people set up integer types)
        if (is_numeric($type_id)) {
            $id = MediaType::find($type_id);
            if ($id) {
                return $id;
            }
            return false;
        }
        
        // if the submitted type id is a string, create a new type in the DB and then
        // return the id of the newly created record for association with the submitted
        // media.
        $id = MediaType::create([
        'name' => $type_id,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
        ]);
        
        return $id->id;
    }
    
    
}
