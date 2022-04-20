<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Admin;
use App\models\stagiaire;
use App\models\entreprise;
use App\models\offre;
use App\models\demande;
use App\models\type;
use App\models\category;
use App\models\domaine;
use App\models\entretienOffre;
use App\models\entretienDemande;

use Auth;

class AdminController extends Controller
{
    function create(request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',

            'password' => 'required|min:5|max:30',
            'resetpassword' => 'required|min:5|max:30|same:password',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = @isset($request->phone) ?$request->phone  : '12333' ;
        $admin->password = \Hash::make($request->password);
        $save = $admin->save();

        if($save){
            return redirect()->back()->with('success','youre logged in succesfully');
        }else{
            return redirect()->back()->with('fail','youre not  logged in ');
        }
    }
    function check(request $request)
    {
         $request->validate([
             'email' => 'required|email|exists:admins,email',
             'password' => 'required|min:5|max:30'
         ]);
 
         $cred = $request->only('email', 'password');
         if(auth::guard('admin')->attempt($cred)){
             return redirect()->route('admin.home')->with('sucess','yes youre logged in');
         }else{
             return redirect()->route('admin.login')->with('fail','wrong credentials');
         }
    }

      function home(){
          $activstagiaire =count(stagiaire::all()->where('actif',1)); 
          $desactivstagiaire =count(stagiaire::all()->where('actif',0)); 
          $desactiventreprise =count(entreprise::all()->where('actif',0)); 
          $activentreprise =count(entreprise::all()->where('actif',1)); 
        $stagiaire = stagiaire::count();
        $entreprise = entreprise::count();
        $offre = offre::count();
        $demande = demande::count();
        return view('dashboard.admin.home',compact('stagiaire','entreprise','offre','demande','activstagiaire','activentreprise','desactivstagiaire','desactiventreprise'));
      }  
    function settings(){
        $stagiaire = auth::guard('admin')->user();
        return view('dashboard.admin.settings',compact('admin'));

    }


     function changepassword(request $request){

            $request->validate([
                'password' => 'required|min:5|max:30',
                'newpassword' => 'required|min:5|max:30',
                'confirmerpassword' => 'required|min:5|max:30|same:newpassword',
            ]);

        
            $cred = $request->only('email','password');
            if(auth::guard('admin')->attempt($cred)){
                $x= \Hash::make($request->newpassword);
                $user =auth::guard('admin')->user();
                $user->password = $x;
                $user->save();
                return redirect()->route('admin.home')->with('success','mot de passe incorrect');

            }else{
                return redirect()->back()->with('fail','mot de passe incorrect');
            }

    }
    function logout() {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    function stagiaires(){

        $stagiaires = stagiaire::all();
        return view('dashboard.admin.stagiaires',compact('stagiaires')); 
    }
    
    function entreprises(){
        
        $entreprises = entreprise::all();
        $domaines = domaine::all();
        $categories = category::all();
        return view('dashboard.admin.entreprises',compact('entreprises','domaines','categories')); 
    }
    function demandes(){
        $stagiaires= stagiaire::all();

        $demandes = demande::all();
        return view('dashboard.admin.demandes',compact('demandes','stagiaires')); 
    }
    function offres(){
        $entreprises= entreprise::all();
            $offres = offre::all();
            return view('dashboard.admin.offres',compact('offres','entreprises')); 
        }
    function entretiens(){

        $entretienOffres = entretienOffre::all();
        $entretienDemandes = entretienDemande::all();
        return view('dashboard.admin.entretiens',compact('entretienOffres','entretienDemandes')); 
    }

    function deletedemandes(demande $demande){
        $demande->delete();

        return redirect()->back()->with('success','la demande est supprimé');
    }
    function deleteoffres( offre $offre ){
        $offre->delete();
        return redirect()->back()->with('success','l\'offre est supprimé');

    }

    function actifEntreprises(entreprise $entreprise){

        $entreprise->actif =1;
          $entreprise->save();
         return redirect()->route('admin.entreprises')->with('success','la publication des offres est activé pour l\'entreprise'); 
  
      }
  
      function desactifEntreprises(entreprise $entreprise){
          $entreprise->actif = 0 ;
          $entreprise->save();
         return redirect()->route('admin.entreprises')->with('success','la publication des offres est désactivé pour l\'entreprise'); 
  
      }  
      function actifStagiaires(stagiaire $stagiaire){

        $stagiaire->actif =1;
          $stagiaire->save();
         return redirect()->route('admin.stagiaires')->with('success','la publication des offres est activé pour l\'stagiaire'); 
  
      }
  
      function desactifStagiaires(stagiaire $stagiaire){
          $stagiaire->actif = 0 ;
          $stagiaire->save();
         return redirect()->route('admin.stagiaires')->with('success','la publication des offres est désactivé pour l\'stagiaire'); 
  
      }    
}
