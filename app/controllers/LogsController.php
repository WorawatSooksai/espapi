<?php

namespace App\Controllers;

use App\Models\Log;

class LogsController extends Controller
{    
    /**
     * Display a listing of the resource.
     */
    public function index() {
        /*
        |--------------------------------------------------------------------------
        |
        | This is an example which retrieves all the data (rows)
        | from our model. You can un-comment it to use this
        | example
        |
        */
        response()->json(Log::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        /*
        |--------------------------------------------------------------------------
        |
        | This is an example which deletes a particular row. 
        | You can un-comment it to use this example
        |
        */
        // $row = new Log;
        // $row->column = request()->get('column');
        // $row->delete();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        /*
        |--------------------------------------------------------------------------
        |
        | This is an example which edits a particular row. 
        | You can un-comment it to use this example
        |
        */
        // $row = Log::find($id);
        // $row->column = request()->get('column');
        // $row->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        /*
        |--------------------------------------------------------------------------
        |
        | This is an example which deletes a particular row. 
        | You can un-comment it to use this example
        |
        */
        // $row = Log::find($id);
        // $row->delete();
    }
}
