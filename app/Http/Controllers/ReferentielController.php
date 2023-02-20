<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Referentiel;
use Illuminate\Http\Request;

class ReferentielController extends Controller
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
        $types = Type::all()->only([1,2]);
        return view('referentiel.referentiel_create', ['types' =>$types]);
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $referentiel = Referentiel::create([
            'libelle' => $request->libelle,
            'validated' => $request->validated,
            'horaire' => $request->horaire,
            'type_id' => $request->types
        ]);

        // $candidat->formations()->attach($request->formations);
        // $formation = Formation::find($request->formations);
        // $formation->referentiels()->attach($request->referentiels);
        // $referentiel = Referentiel::find($request->referentiels);
        // Referentiel::create([
        //     'libelle'=>$referentiel->libelle,
        //     'validated'=>$referentiel->validated,
        //     'horaire'=>$referentiel->horaire,
        //     'type_id'=>$request->types,
        // ]);

        
        return redirect()->route('welcome'); 
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
