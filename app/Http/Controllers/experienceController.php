<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\experience;
use Illuminate\Http\Request;
use Auth;
class experienceController extends Controller
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
        return view('dashboard.stagiaire.experience.create');
        
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
            'post' => 'required',
            'description' => 'sometimes',
            'dateDebut' => 'required|date|before:dateFin',
            'dateFin' => 'required|date|after:dateDebut',
        ]);

        experience::create([
            'nomExperience' => $request->nom,
            'type' =>$request->type,
            'dateDebut' => $request->dateDebut,
            'dateFin' => $request->dateFin,
            'post' => $request->post,
            'description' =>@isset($request->description) ?$request->description  : '' ,
            'stagiaire_id' =>Auth::user()->id,
        ]);

        return redirect()->route('stagiaire.infos')->with('success','l\'éxperience est créer avec succés');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(experience $experience)
    {
        return view('dashboard.stagiaire.experience.show',compact('experience'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(experience $experience)
    {  
        $experiences = auth::guard('stagiaire')->user()->experiences;
      
        // if (! Gate::allows('update-experience', $experience)) {
        //     abort(403);
        // }

        return view('dashboard.stagiaire.experience.edit',compact('experience','experiences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, experience $experience)
    {
       $arrayrequest = [
        'nomExperience' => $request->nom,
        'type' =>$request->type,
        'dateDebut' => $request->dateDebut,
        'dateFin' => $request->dateFin,
        'post' => $request->post,
        'description' =>@isset($request->description) ?$request->description  : '' ,
        'stagiaire_id' =>Auth::user()->id,
       ];

       $experience->update($arrayrequest);

       return redirect()->route('stagiaire.infos')->with('success','experience est modifié avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(experience $experience)
    {
        if (! Gate::allows('delete-experience', $experience)){
            abort(403);
        }
        $experience->delete();
       return view('dashboard.stagiaire.home')->with('experienceDelete','experience est supprimé avec succés');

    }
}
