<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dep;
use App\branch;
use App\media;

class DepsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
        /*
          'dep-list',
          'dep-create',
          'dep-edit',
          'dep-delete',
         */
        $this->middleware('permission:dep-list');
        $this->middleware('permission:dep-create', ['only' => ['create', 'store']]);
        $this->middleware('premission:dep-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:dep-delete', ['only' => ['destroy']]);
    }

    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('Dashboard/add_deps');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $rules = [];
        $rules = [
            'name' => 'required|string|max:255',
            'year_found' => 'required|string|max:255',
            'descirptions' => 'required|string|max:255'
        ];
        $request->validate($rules);
        $deps = new dep();
        $deps->name = $request->input('name');
        $deps->year_found = $request->input('year_found');
        $deps->descirptions = $request->input('descirptions');
        $user = auth()->user();
        $deps->SuperVisior()->associate($user);
        $deps->save();

        foreach ($request->input('branchs') as $key => $value) {
            $rules["branchs.{$key}"] = 'required|string|max:255';
            $request->validate($rules);
        }
        foreach ($request->input('branchs') as $br) {
            $branch = new branch();
            $branch->branch = $br;
            $branch->dep()->associate($deps);
            $branch->save();
        }
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $key => $value) {
                $rules["media.{$key}"] = 'nullable|mimes:jpg,jpeg,png,gif,mp4,mwv,wma,webm';
                $request->validate($rules);
            }
            foreach ($request->file('media') as $file) {
                $path = $file->store('media_deps');
            }
            foreach ($request->file('media') as $key => $value) {
                $media = new media();
                $media->url = $value;
                $allowedMimeTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'image/svg+xml'];
                $mimType = $value->getMimeType();
                if (in_array($mimType, $allowedMimeTypes)) {
                    $media->is_image = 1;
                } else {
                    $media->is_image = 0;
                }
                $media->dep()->associate($deps);
                $media->save();
            }
        }
        return redirect()->route('admin.home')->with(['status' => 'success', 'message' => __('Stored successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
