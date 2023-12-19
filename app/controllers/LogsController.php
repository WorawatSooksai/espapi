<?php

namespace App\Controllers;

use App\Models\Log;
use App\Models\Variable;

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
        $var_sel = Variable::where('name',$_POST['v_name'])->first();

        
        $var = Log::insert([
            "variable_id" => $var_sel->id,
            ("v_".$var_sel['type']) => $_POST['value'],
            "created_at" => date("Y-m-d h:i:s"),
        ]);        
       
        response()->json($var_sel);
        
    }

    /**
     * Display the specified resource.
     */
    public function show($v_name)
    {
        $var_show = Log::where('variables.name',$v_name)
            ->join('variables','variables.id','logs.id')
            ->orderyBy('created_at','desc')
            ->get();
        response()->json($var_show);
    }
    public function last($v_name){
        $var_show = Log::where('variables.name',$v_name)
            ->join('variables','variables.id','logs.id')
            ->orderyBy('created_at','desc')
            ->first();
        response()->json($var_show);

    }
    public function storeByGET($v_name,$value){
        $var_sel = Variable::where('name',$v_name)->first();

        
        $var = Log::insert([
            "variable_id" => $var_sel->id,
            ("v_".$var_sel['type']) => $value,
            "created_at" => date("Y-m-d h:i:s"),
        ]);        
       
        response()->json($var);
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
