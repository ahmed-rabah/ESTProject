<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\offre;
use App\models\type;
use App\models\domaine;
use App\models\demande;
use App\models\candidature;
use App\models\entreprise;

use Auth;
class offresController extends Controller
{
    public function index(request $request){
        $types= type::all();
        $domaines= domaine::all();
        $mindomaines= domaine::limit(7)->get();
        $entreprises = entreprise::all();
        $x = count(demande::all());
        $y = count(offre::all());
        $offres = offre::orderBy('dateDebut')->get();
        $candidatures= candidature::all();

        
        if( $request->type){
            $offres = $offres->where('type_id', '=',  $request->type );
           
        }
        if( $request->domaine){
            $offres = $offres->where('domaine_id', '=', $request->domaine);
        }
        if( $request->renumeration){
            $offres = $offres->where('renumeration', '=', $request->renumeration);
        }
        if( $request->domaine && $request->type && $request->renumeration){
            $offres = $offres->where('domaine_id', '=', $request->domaine)
                         ->where('type_id', '=', $request->type)
                         ->where('renumeration', $request->renumeration);
        }

        return view('offres',compact('request','offres','types','domaines','entreprises','candidatures','x','y','mindomaines'));
    }

    public function offre(offre $offre)
    {   
        $offres = offre::all();
        $entreprise =entreprise::all();
        $domaine =domaine::all();
        $type =type::all();
        return view('profile.offre',compact('offre','offres','entreprise','type','domaine'));
    }

    public function postuler(offre $offre)
    {
        candidature::create([
            'offre_id' =>$offre->id,
            'stagiaire_id' => auth::guard('stagiaire')->user()->id,

        ]);

        return redirect()->back()->with('success','vous avez postuler avec succés à l\'offre');
    }
   
}
