<?php

namespace App\Http\Controllers\stagiaire;

use App\Policies\PostPolicy;
use Illuminate\Http\Request;
use App\Models\stagiaire;
use App\Models\school;
use App\Models\demande;
use App\Models\candidature;
use App\Models\feedbackStagiaire;
use App\Models\type;
use App\Models\domaine;
use App\Models\experience;
use App\Models\entretienOffre;
use App\Models\entretienDemande;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorestagiaireRequest;
use App\Http\Requests\UpdatestagiaireRequest;
use Auth;

class StagiaireController extends Controller
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

     function create(StorestagiaireRequest $request)
    {   
        $request->validate([
            'name' => 'required',
            'prenom' => 'required',
            'dateN' => 'required|date|before_or_equal:2004-01-01',
            'CIN' => 'required|unique:stagiaires,CIN',
            'email' => 'required|email|unique:stagiaires,email',
            'phone' => 'required|unique:stagiaires,telephone',
            'gendre' => 'required',
            'password' => 'required|min:5|max:30',
            'resetpassword' => 'required|min:5|max:30|same:password',
       ]);

       $stagiaire = new stagiaire();
       $stagiaire->nom_stagiaire = $request->name;
       $stagiaire->prenom_stagiaire = $request->prenom;
       $stagiaire->dateNaissance = $request->dateN;
       $stagiaire->CIN = $request->CIN;
       $stagiaire->email = $request->email;
       
       $stagiaire->telephone = $request->phone;
       $stagiaire->gendre = $request->gendre;
       $stagiaire->photo = '';
       $stagiaire->password = \Hash::make($request->password);
       $save = $stagiaire->save();
       
       if($save){
        return redirect()->back()->with('success','le compte est créer , se connecter maintenant');
    }else{
        return redirect()->back()->with('fail','les informations invalides');
    }
    }


    public function entretiens()
    {
        $demandes = auth::guard('stagiaire')->user()->demandes;
        $entretienOffres = auth::guard('stagiaire')->user()->entretienOffres;
        
        $entretienDemandes =entretienDemande::whereIN('demande_id',$demandes)->get();
        $countentretienOffres =count(auth::guard('stagiaire')->user()->entretienOffres);
        $countentretienDemandes =count($entretienDemandes);
       
            
        return view('dashboard.stagiaire.entretiens',compact('entretienOffres','entretienDemandes','countentretienDemandes','countentretienOffres'));
    }

    public function candidatures()
    {       
            $candidatures = auth::guard('stagiaire')->user()->candidatures;
            
            return view('dashboard.stagiaire.candidatures',compact('candidatures'));
    }


    public function confirmerDemande(request $request)
    {
        $entretienDemande = entretienDemande::find($request->id);

        $entretienDemande->demande_id = $request->demande_id ;
            $entretienDemande->entreprise_id = $request->entreprise_id ;
            $entretienDemande->accepter = 1 ; 
            $entretienDemande->save();
            return redirect()->back()->with('success','vous avez accepter l\'offre , vous allez recevoir un email du l\'entreprise') ;

    }
    public function confirmer( request $request)
    {    
        //    dd($request);
                $entretien =entretienOffre::find($request->id);
            $entretien->offre_id = $request->offre_id ;
            $entretien->stagiaire_id = $request->stagiaire_id ;
            $entretien->accepter = 1 ; 
            $entretien->save();
            return redirect()->back()->with('success','vous avez accepter l\'offre , vous allez recevoir un email du l\'entreprise') ;

    }
    public function feedback(request $request)
    {
        $request->validate([
            'id' => 'required',
            'email' => 'required',
            'feedback' => 'required',
        ]);
        $feedback = new feedbackStagiaire();
        $feedback->stagiaire_id = $request->id;
        $feedback->feedback = $request->feedback;
         $save= $feedback->save();
        if($save) { 
            return redirect()->route('home')->with('success','merci pour votre feedback');
            }
           else{
            return redirect()->route('home')->with('fail','votre feedback n\'est pas envoyé');
    
            }
    }
    function settings(){
        $stagiaire = auth::guard('stagiaire')->user();
        return view('dashboard.stagiaire.settings',compact('stagiaire'));

    }


     function changepassword(request $request){

            $request->validate([
                'password' => 'required|min:5|max:30',
                'newpassword' => 'required|min:5|max:30',
                'confirmerpassword' => 'required|min:5|max:30|same:newpassword',
            ]);

        
            $cred = $request->only('email','password');
            if(auth::guard('stagiaire')->attempt($cred)){
                $x= \Hash::make($request->newpassword);
                $user =auth::guard('stagiaire')->user();
                $user->password = $x;
                $user->save();
                return redirect()->route('stagiaire.home')->with('success','mot de passe incorrect');

            }else{
                return redirect()->back()->with('fail','mot de passe incorrect');
            }

    }

    public function stagiaire(stagiaire $stagiaire){
        $parcours = $stagiaire->schools;
        $countparcours =count( $stagiaire->schools);
        $experiences = $stagiaire->experiences;
        $countexperiences =count($stagiaire->experiences);
        $demandes =$stagiaire->demandes;
        $countdemandes =count($stagiaire->demandes);
        $types =type::all();
        $domaines =domaine::all();
        return view('profile.stagiaire',compact('stagiaire','types','domaines','demandes','countdemandes','parcours','experiences','countparcours','countexperiences'));

    }
    function home(){
        $demandes = auth::guard('stagiaire')->user()->demandes;       
        $entretienDemandes =entretienDemande::whereIN('demande_id',$demandes)->get();
        $countentretienOffres =count(auth::guard('stagiaire')->user()->entretienOffres);
        $countentretienDemandes =count($entretienDemandes);
        $countentretien =$countentretienDemandes + $countentretienOffres;

        $stagiaire = auth::guard('stagiaire')->user();
        $countparcours = count(school::all()->where('stagiaire_id',$stagiaire->id));
        $countexperience = count(experience::all()->where('stagiaire_id',$stagiaire->id));
        $countdemande = count(demande::all()->where('stagiaire_id',$stagiaire->id));
        $countcandidature = count(candidature::all()->where('stagiaire_id',$stagiaire->id));
        return view('dashboard.stagiaire.home',compact('stagiaire','countentretien','countdemande','countparcours','countexperience','countcandidature'));
        
    }
    function check(request $request)
    {
         $request->validate([
             'email' => 'required|email|exists:stagiaires,email',
             'password' => 'required|min:5|max:30'
         ]);
 
         $cred = $request->only('email', 'password');
         if(auth::guard('stagiaire')->attempt($cred)){
             return redirect()->route('stagiaire.home')->with('sucess','yes youre logged in');
         }else{
             return redirect()->route('stagiaire.login')->with('fail','fausses informations d\'identification');
         }
    }

    function logout() {
        Auth::guard('stagiaire')->logout();
        return redirect('/');
    }


    public function infos() 
    { 
       
        $stagiaire = auth::guard('stagiaire')->user();
      
        $parcours = auth::guard('stagiaire')->user()->schools;
        $experiences = auth::guard('stagiaire')->user()->experiences;
      
        return view('dashboard.stagiaire.infos',compact('parcours','stagiaire','experiences'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorestagiaireRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestagiaireRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function show(stagiaire $stagiaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function edit(stagiaire $stagiaire)
    {
        //
    }

    
    public function update(UpdatestagiaireRequest $request, stagiaire $stagiaire)
    {
        //
    }

    public function updatePersonal(UpdatestagiaireRequest $request, stagiaire $stagiaire){
       
        // dd($request->photo);
       
           
             
             if(isset($request->photo)){
                $photoName = $request->photo->store('stagiaires'); }else{
                    $photoName ="";
                }

                if(isset($request->CV)){
                    $CVName = $request->CV->store('stagiaires'); }
                    else{
                        $CVName ="";
                    }
           
             

       $arrayreq=[  
         'nom_stagiaire' => $request->name,
       'prenom_stagiaire' => $request->prenom,
       'dateNaissance' => $request->dateN,
       'CIN' => $request->CIN,
       'photo' => $photoName,
       'CV' => $CVName,
       'email' => $request->email,
       'telephone' => $request->phone,
       'gendre' => $request->gendre,
     'diplome' =>$request->diplome,
     'description' => $request->description,
    
       ];
          $stagiaire->update($arrayreq);
        return redirect()->back()->with('success','les informations sont modifiés avec succés');
      

    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(stagiaire $stagiaire)
    {
        //
    }
}
