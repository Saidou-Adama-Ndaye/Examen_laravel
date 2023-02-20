<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = DB::select(DB::raw("SELECT COUNT(*) as formations, isStarted as ise FROM formations GROUP BY isStarted;"));
    $dat = "";
    $attente = [];
    foreach($results as $values) {
        if($values->ise == 0) 
        {
            $attente[] = "en attente";
        }
        else {
            $attente[] = "en cours";
        }
        foreach($attente as $att) {
            $dat .= "['".$att."', ".$values->formations."],";
        }
            
    }
   

    $dats=$dat;
        return view('formation.formation_create', ['dats' =>$dats]);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Formation::create([
            'nom' => $request->nom,
            'duree' => $request->duree,
            'description' => $request->description,
            'isStarted' => $request->isStarted,
            'date_debut' => $request->date_debut,
        ]);

        
        return redirect()->back(); 
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
