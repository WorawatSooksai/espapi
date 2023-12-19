<?php

namespace App\Controllers;

use App\Models\Variable;
use Illuminate\Support\Facades\Request;

class VariablesController extends Controller
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
        response()->json(Variable::all());
        
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
        // $row = new Variable;
        // $row->column = request()->get('column');
        // $row->delete();

        $var = Variable::insert([
            "name" => $_POST['name'],
            "type" => $_POST['type'],
            "created_at" => date("Y-m-d h:i:s"),
        ]);        
       
        response()->json($var);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        response()->json(Variable::where('id',$id)->first()->join());        
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
        // $row = Variable::find($id);
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
        // $row = Variable::find($id);
        // $row->delete();
    }
}
