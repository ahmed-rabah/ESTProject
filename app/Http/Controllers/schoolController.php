<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Policies\PostPolicy;
use App\Models\school;
use App\Models\stagiaire;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Gate;
class schoolController extends Controller
{
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
        return view('dashboard.stagiaire.school.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'type' => 'required',
            'filiere' => 'required',
            'dateDebut' => 'required|date|before:dateFin',
            'dateFin' => 'required|date|after:dateDebut',
        ]);

        school::create([
            'nomEtablissement' => $request->nom,
            'typeDiplome' =>$request->type,
            'dateDebut' => $request->dateDebut,
            'dateFin' => $request->dateFin,
            'filiere' => $request->filiere,
            'description' =>@isset($request->description) ?$request->description  : '' ,
            'status' => @isset($request->status) ?$request->status  : '',
            'stagiaire_id' =>Auth::user()->id,
        ]);

        return redirect()->route('stagiaire.infos')->with('success','le parcours scolaire est créer avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function show(school $school)
    {
        return view('dashboard.stagiaire.school.show',compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(school $school)
    {
        $stagiaire = auth::guard('stagiaire')->user();
        $parcours = auth::guard('stagiaire')->user()->schools;

        if (!Gate::allows('update-school', $school)) {
            abort(403);
        }

        return view('dashboard.stagiaire.school.edit',compact('school','parcours'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, school $school)
    {
        $stagiaire = auth::guard('stagiaire')->user();
        $parcours = auth::guard('stagiaire')->user()->schools;


        $arrayrequest = [
            'nomEtablissement' => $request->nom,
            'typeDiplome' =>$request->type,
            'dateDebut' => $request->dateDebut,
            'dateFin' => $request->dateFin,
            'filiere' => $request->filiere,
            'description' =>@isset($request->description) ?$request->description  : '' ,
            'status' => @isset($request->status) ?$request->status  : '',
            'stagiaire_id' =>auth::guard('stagiaire')->user()->id,
           ];
            $x= $school->update($arrayrequest);

          
           return redirect()->route('stagiaire.infos')->with('schoolUpdate','school est modifié avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\school  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(school $school)
    {
        if (! Gate::allows('delete-school', $school)){
            abort(403);
        }
        $school->delete();
       return view('dashboard.stagiaire.home')->with('schoolDelete','school est supprimé avec succés');
    }
}
