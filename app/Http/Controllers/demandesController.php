<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\offre;
use Illuminate\Support\Str;
use App\models\demande;
use App\models\stagiaire;
use App\models\type;
use App\models\entretienDemande;
use App\models\entretienOffre;
use App\models\domaine;
use App\models\candidature;
use Auth;
class demandesController extends Controller
{
    public function index(request $request)
    {
        $types= type::all();
        $mindomaines= domaine::limit(7)->get();
        $domaines= domaine::all();
        $demandes = demande::orderBy('dateDebut')->get();
        $stagiaires = stagiaire::all();
        $x = count(demande::all());
        $y = count(offre::all());
        $entretiens = entretienDemande::all();


        if( $request->type){
            $demandes = $demandes->where('type_id', '=',  $request->type );
           
        }
        if( $request->domaine){
            $demandes = $demandes->where('domaine_id', '=', $request->domaine);
        }
        if( $request->renumeration){
            $demandes = $demandes->where('renumeration', '=', $request->renumeration);
        }
        if( $request->domaine && $request->type && $request->renumeration){
            $demandes = $demandes->where('domaine_id', '=', $request->domaine)
                         ->where('type_id', '=', $request->type)
                         ->where('renumeration', $request->renumeration);
        }

        return view('demandes',compact('entretiens','request','demandes','types','domaines','stagiaires','x','y','mindomaines'));
    }

    public function convoquer(candidature $candidature)
    {      
        entretienOffre::create([
            'offre_id' => $candidature->offre_id,
            'stagiaire_id' =>$candidature->stagiaire_id,
            'accepter' => 0,
        ]);

        return redirect()->back()->with('success','vous avez convoquer le stagiaire, en attente de son confirmation');
    }

    public function demande(demande $demande)
    {
        $stagiaire =stagiaire::all();
        $domaine =domaine::all();
        $entretiens = entretienDemande::all();
        $type =type::all();
        return view('profile.demande',compact('entretiens','demande','stagiaire','type','domaine'));
    }

  
}
