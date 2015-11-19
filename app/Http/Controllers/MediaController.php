<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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
    public function store(Request $request)
    {
        // validate with a media request
        
        //dd($request->input());
        
        $request->user()->media()->create([
           'title' => $request->input('title'),
           'author' => $request->input('author'),
           'type_id' => $request->input('type_id'),
           'release_date' => $request->input('release_date'),
           'consumed' => $request->input('consumed'),
           'rating' => $request->input('star')
        ]);
        
        \Flash::success('New media successfully added');
        
        return redirect('media');
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
