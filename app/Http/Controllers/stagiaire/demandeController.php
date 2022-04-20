<?php

namespace App\Http\Controllers\stagiaire;

use App\Http\Controllers\Controller;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use App\Models\demande;
use App\Models\domaine;
use App\Models\stagiaire;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class demandeController extends Controller
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
        $types = type::all();
        $domaines =domaine::all();
        return view('dashboard.stagiaire.demande.create',compact('types','domaines'));
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
         'dateDebut' => 'required|date|before:dateFin',
        'dateFin' => 'required|date|after:dateDebut',
        'ville' => 'required',
        'renumeration' => 'required|bool',
        'type' => 'required',
        'domaine' => 'required', 
        'description' => 'required', 

        ]);
        demande::create([
            'dateDebut' => $request->dateDebut,
            'dateFin' => $request->dateFin,
            'renumeration' =>$request->renumeration,
            'ville' => @isset($request->ville) ? $request->ville : '',
            'stagiaire_id' =>Auth::user()->id,
            'type_id' =>$request->type,
            'domaine_id' =>$request->domaine,
            'description' =>$request->description,
        ]);
        
       
        return redirect()->route('stagiaire.demande.dashboard')->with('success','la demande est créer avec succés');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function show(demande $demande)
    {
        return view('dashboard.stagiaire.demande.show',compact('demande'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(demande $demande)
    {    $types = type::all();
        $domaines =domaine::all();
        $stagiaire =auth::guard('stagiaire')->user();
        
        if (! Gate::allows('update-demande', $demande)) {
            abort(403);
        }

        return view('dashboard.stagiaire.demande.edit',compact('demande','stagiaire','types','domaines'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, demande $demande)
    {
        $request->validate([
            'dateDebut' => 'required|date|before:dateFin',
           'dateFin' => 'required|date|after:dateDebut',
           'ville' => 'required',
           'renumeration' => 'required|bool',
           'type' => 'required',
           'domaine' => 'required', 
           'description' => 'required'
           ]);

           $stagiaire= auth::guard('stagiaire')->user();
        $types = type::all();
        $domaines =domaine::all();
        $offres = auth::guard('stagiaire')->user()->offres;
       $arrayrequest =[
        'dateDebut' => $request->dateDebut,
        'dateFin' => $request->dateFin,
        'ville' => $request->ville,
        'stagiaire_id' =>Auth::user()->id,
        'renumeration' => $request->renumeration,
        'type_id' =>$request->type,
        'domaine_id' =>$request->domaine,
        'description' =>$request->description,
       ];
       $demande->update($arrayrequest);

       return redirect()->route('stagiaire.demande.dashboard')->with('success','la demande est modifié avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(demande $demande)
    {   
        if (! Gate::allows('delete-demande', $demande)){
            abort(403);
        }
        
        $demande->delete();
       return redirect()->route('stagiaire.demande.dashboard')->with('success','la demande est supprimé avec succés');

    }

    function dashboard()
    {   
        $stagiaire =auth::guard('stagiaire')->user();
         $types = type::all();
        $domaines =domaine::all();
          $demandes = auth::guard('stagiaire')->user()->demandes;
        return view('dashboard.stagiaire.demande.display',compact('stagiaire','demandes','domaines','types'));
    }
}
