<?php

namespace App\Http\Controllers\entreprise;

use App\Http\Controllers\Controller;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\offre;
use App\Models\candidature;
use App\Models\entreprise;
use App\Models\entretienOffre;
use App\Models\type;
use App\Models\domaine;
use Auth;

class offreController extends Controller
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
        $entreprise= auth::guard('entreprise')->user();
        $types = type::all();
        $domaines =domaine::all();

        // if (! Gate::allows('update-offre', $offre)) {
        //     abort(403);
        // }

        return view('dashboard.entreprise.offre.create',compact('types','domaines','entreprise'));
    
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
           'description' => 'required'
           ]);
          
           offre::create([
               'dateDebut' => $request->dateDebut,
               'dateFin' => $request->dateFin,
               'ville' => @isset($request->ville) ? $request->ville : '',
               'entreprise_id' =>Auth::user()->id,
               'renumeration' => $request->renumeration,
               'type_id' =>$request->type,
               'domaine_id' =>$request->domaine,           
               'description' =>$request->description,
       
           ]);
           return redirect()->route('entreprise.offre.dashboard')->with('success','l\'offre est créer avec succés');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function show(offre $offre)
    {
        return view('dashboard.entreprise.offre.show',compact('offre'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function edit(offre $offre)
    {    $entreprise= auth::guard('entreprise')->user();
        $types = type::all();
        $domaines =domaine::all();

        if (! Gate::allows('update-offre', $offre)) {
            abort(403);
        }

        return view('dashboard.entreprise.offre.edit',compact('offre','types','domaines','entreprise'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, offre $offre)
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

        $entreprise= auth::guard('entreprise')->user();
        $types = type::all();
        $domaines =domaine::all();
        $offres = auth::guard('entreprise')->user()->offres;
        
       $arrayrequest =[
        'dateDebut' => $request->dateDebut,
        'dateFin' => $request->dateFin,
        'ville' => @isset($request->ville) ? $request->ville : '',
        'entreprise_id' =>$entreprise->id,
        'renumeration' => $request->renumeration,
        'type_id' =>$request->type,
        'domaine_id' =>$request->domaine,
        'description' =>$request->description,
       ];
       $offre->update($arrayrequest);

       return redirect()->route('entreprise.offre.dashboard')->with('success','l\'offre est modifié avec succés');

    }

      function dashboard(){
        $entretienOffres = entretienOffre::all();
        $candidatures =candidature::all();
        $entreprise= auth::guard('entreprise')->user();
        $types = type::all();
        $domaines =domaine::all();
        $offres = auth::guard('entreprise')->user()->offres;
        return view('dashboard.entreprise.offre.display',compact('entreprise','entretienOffres','candidatures','offres','domaines','types'));
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\offre  $offre
     * @return \Illuminate\Http\Response
     */
    public function destroy(offre $offre)
    {
        if (! Gate::allows('delete-offre', $offre)){
            abort(403);
        }
        $offre->delete();
      
      
       return redirect()->route('entreprise.offre.dashboard')->with('success','l\'offre est supprimé avec succés');

    }
}
