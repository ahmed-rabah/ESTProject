<?php

namespace App\Http\Controllers\entreprise;

use App\Models\category;
use App\Models\domaine;
use App\Models\offre;
use App\Models\entretienDemande;
use App\Models\entretienOffre;
use App\Models\entreprise;
use App\Models\demande;
use App\Models\stagiaire;
use App\models\feedbackEntreprise;
use App\models\feedbackStagiaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreentrepriseRequest;
use App\Http\Requests\UpdateentrepriseRequest;
use Auth;
class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function infos() 
    { 
        
        $entreprise = auth::guard('entreprise')->user();
        $categories = category::all();
        $domaines = domaine::all();
        $countoffre = count(offre::all()->where('entreprise_id',$entreprise->id));
        
        $offres = auth::guard('entreprise')->user()->offres;
        $entretienOffres =entretienOffre::whereIN('offre_id',$offres)->get();
    
        $entretienDemandes = auth::guard('entreprise')->user()->entretienDemandes;
    
        $countentretienOffres =count($entretienOffres);
        $countentretienDemandes =count($entretienDemandes);
        $countentretien = $countentretienDemandes + $countentretienOffres;
      
        return view('dashboard.entreprise.infos',compact('entreprise','countentretien','categories','domaines','countoffre'));
    }
    public function index()
    {
        //
    }

   public function entretiens()
   {
    $offres = auth::guard('entreprise')->user()->offres;
    $entretienOffres =entretienOffre::whereIN('offre_id',$offres)->get();

    $entretienDemandes = auth::guard('entreprise')->user()->entretienDemandes;

    $countentretienOffres =count($entretienOffres);
    $countentretienDemandes =count($entretienDemandes);
    return view('dashboard.entreprise.entretiens',compact('entretienDemandes','entretienOffres','countentretienOffres','countentretienDemandes'));
   }


    public function create(request $request)
    {
        $request->validate([
            'ICE' => 'required|unique:entreprises,ICE',
            'nom' => 'required|unique:entreprises,nom_entreprise',
            'ville' => 'required',
            'email' => 'required|email|unique:entreprises,email',
            'telephone' => 'required|unique:entreprises,telephone',
            'adresse' => 'required|unique:entreprises,adresse',
            'category' => 'required',
            'domaine' => 'required',
            'password' => 'required|min:5|max:30',
            'resetpassword' => 'required|min:5|max:30|same:password',
        ]);

        $entreprise = new entreprise();
        $entreprise->ICE = $request->ICE;
        $entreprise->nom_entreprise = $request->nom;
        $entreprise->ville = $request->ville;
        $entreprise->email = $request->email;
        $entreprise->telephone = $request->telephone;
        $entreprise->adresse = $request->adresse;
        $entreprise->category_id = $request->category;
        $entreprise->domaine_id = $request->domaine;
        $entreprise->password = \Hash::make($request->password);
        $save = $entreprise->save();

        if($save){
            return redirect()->back()->with('success','le compte est créer');
        }else{
            return redirect()->back()->with('fail','le compte n\'est pas créer ');
        }
    }

    function settings(){
        $entreprise = auth::guard('entreprise')->user();
        return view('dashboard.entreprise.settings',compact('entreprise'));

    }


     function changepassword(request $request){

            $request->validate([
                'password' => 'required|min:5|max:30',
                'newpassword' => 'required|min:5|max:30',
                'confirmerpassword' => 'required|min:5|max:30|same:newpassword',
            ]);

        
            $cred = $request->only('email','password');
            if(auth::guard('entreprise')->attempt($cred)){
                $x= \Hash::make($request->newpassword);
                $user =auth::guard('entreprise')->user();
                $user->password = $x;
                $user->save();
                return redirect()->route('entreprise.home')->with('success','mot de passe incorrect');

            }else{
                return redirect()->back()->with('fail','mot de passe incorrect');
            }

    }

    public function homefeed()
    {
        $feedentreprises = feedbackEntreprise::limit(2)->get();
        $feedstagiaires = feedbackstagiaire::limit(2)->get();
      
        return view('home',compact('feedstagiaires','feedentreprises'));
    }
    public function feedback(request $request)
    {
        $request->validate([
            'id' => 'required',
            'email' => 'required',
            'feedback' => 'required',
        ]);
        $feedback = new feedbackEntreprise();
        $feedback->entreprise_id = $request->id;
        $feedback->feedback = $request->feedback;
       
       $save= $feedback->save();
       if($save) { 
        return redirect()->route('home')->with('success','merci pour votre feedback');
        }
       else{
        return redirect()->route('home')->with('fail','votre feedback n\'est pas envoyé');

        }

    }



    public function entreprise(entreprise $entreprise)
    {   
        $offres =$entreprise->offres;
        $countoffres =count($entreprise->offres);
        $categories =category::all();
        $domaines =domaine::all();
        return view('profile.entreprise',compact('entreprise','domaines','categories','offres','countoffres'));
    }
    public function register()
    {   $categories =category::all();
        $domaines =domaine::all();
        return view('dashboard.entreprise.register',compact('categories', 'domaines'));
    }

    function check(request $request)
    {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required|min:5|max:30'
         ]);
 
         $cred = $request->only('email', 'password');
         if(auth::guard('entreprise')->attempt($cred)){
             return redirect()->route('entreprise.home')->with('sucess','yes youre logged in');
         }else{
             return redirect()->route('entreprise.login')->with('fail','fausses informations d\'identification');
         }
    }
    function logout() {
        Auth::guard('entreprise')->logout();
        return redirect('/');
    }

    function home()
    {
        return redirect()->route('entreprise.infos');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreentrepriseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreentrepriseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function show(entreprise $entreprise)
    {
        //
    }

    public function edit(entreprise $entreprise)
    {
        //
    }

    public function update(request $request, entreprise $entreprise)
    {

        $request->validate([
            'ICE' => 'required',
            'name' => 'required',
            'ville' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'adresse' => 'required',
            'category' => 'required',
            'domaine' => 'required',
            'description' =>'sometimes',
            'logo' => 'image|sometimes',

        ]);
        if(isset($request->logo)){
            $logoName = $request->logo->store('entreprises'); }else{
                $logoName ="";
            }

            $arrayreq=[  
                'ICE' => $request->ICE,
        'nom_entreprise' => $request->name,
        'ville' => $request->ville,
        'email' => $request->email,
        'telephone' => $request->phone,
        'adresse' => $request->adresse,
        'category_id' => $request->category,
        'domaine_id' => $request->domaine,
        'logo' => $logoName,
         'description' => $request->description,
            ];

           $entreprise->update($arrayreq);
           return redirect()->route('entreprise.infos')->with('success','les informations sont modifiés avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\entreprise  $entreprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(entreprise $entreprise)
    {
        //
    }
}
