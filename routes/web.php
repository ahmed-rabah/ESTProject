<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\User\UserController;
use App\Http\controllers\Admin\AdminController;
use App\Http\controllers\stagiaire\StagiaireController;
use App\Http\controllers\stagiaire\demandeController;
use App\Http\controllers\entreprise\EntrepriseController;
use App\Http\controllers\entreprise\offreController;
use App\Http\controllers\schoolController;
use App\Http\controllers\demandesController;
use App\Http\controllers\offresController;
use App\Http\controllers\experienceController;
use App\Http\controllers\HomeController;
use App\models\stagiaire;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/',[EntrepriseController::class,'homefeed'])->name('home');
route::get('/download{stagiaire}', function (stagiaire $stagiaire) { 
    $path =public_path('/storage/'.$stagiaire->CV);
    return response()->download($path);
    // return Storage::download('pic/profile.png');
})->name('downloadCV');

route::get('/stagiaire{stagiaire}',[StagiaireController::class,'stagiaire'])->name('stagiaire_profile');
route::get('/entreprise{entreprise}',[EntrepriseController::class,'entreprise'])->name('entreprise_profile');
route::get('/offres', [offresController::class,'index'])->name('offres');
route::get('/offre{offre}',[offresController::class,'offre'])->name('offre');
route::get('/demandes', [demandesController::class,'index'])->name('demandes');
route::get('/demande{demande}',[demandesController::class,'demande'])->name('demande');

Auth::routes();

route::prefix('user')->name('user.')->group(function () {
    
    route::middleware(['guest:web','PreventBackHistory'])->group(function () {
        route::view('/login','Dashboard.user.login')->name('login');
        route::view('/register','Dashboard.user.register')->name('register');
        route::post('/create',[UserController::class,'create'])->name('create');
        route::post('/check',[UserController::class,'check'])->name('check');
    });
    
    route::middleware(['auth:web','PreventBackHistory'])->group(function () {
        route::view('/home','Dashboard.user.home')->name('home');
        route::post('/logout',[UserController::class,'logout'])->name('logout');
    });
    
    
});

route::prefix('admin')->name('admin.')->group(function () {
    
    route::middleware(['guest:admin','PreventBackHistory'])->group(function () {
        route::view('/login','Dashboard.admin.login')->name('login');
        route::view('/register','Dashboard.admin.register')->name('register');
        route::post('/create',[AdminController::class,'create'])->name('create');
        route::post('/check',[AdminController::class,'check'])->name('check');
    });
    
    route::middleware(['auth:admin','PreventBackHistory'])->group(function () {
        route::get('/home',[AdminController::class,'home'])->name('home');
        route::post('/logout',[AdminController::class,'logout'])->name('logout');
        route::get('/infos',[AdminController::class,'infos'])->name('infos');  //
        route::get('/entretiens',[AdminController::class,'entretiens'])->name('entretiens'); //
        route::view('/settings','Dashboard.Admin.settings')->name('settings'); //
        route::get('/stagiaires',[AdminController::class,'stagiaires'])->name('stagiaires'); //
        route::get('/entreprises',[AdminController::class,'entreprises'])->name('entreprises'); //
        route::get('/demandes',[AdminController::class,'demandes'])->name('demandes'); //
        route::post('/deletedemandes{demande}',[AdminController::class,'deletedemandes'])->name('deletedemandes'); //
        route::get('/offres',[AdminController::class,'offres'])->name('offres'); //
        route::post('/deleteoffres{offre}',[AdminController::class,'deleteoffres'])->name('deleteoffres'); //
        route::post('/changepassword',[AdminController::class,'changepassword'])->name('changepassword'); //
        route::post('/actifEntreprises{entreprise}',[AdminController::class,'actifEntreprises'])->name('actifEntreprises'); //
        route::post('/desactifEntreprises{entreprise}',[AdminController::class,'desactifEntreprises'])->name('desactifEntreprises'); //
        route::post('/actifStagiaires{stagiaire}',[AdminController::class,'actifStagiaires'])->name('actifStagiaires'); //
        route::post('/desactifStagiaires{stagiaire}',[AdminController::class,'desactifStagiaires'])->name('desactifStagiaires'); //
        
        
    });
    
    
    
    
});

route::prefix('stagiaire')->name('stagiaire.')->group(function () {
    
    route::middleware(['guest:stagiaire','PreventBackHistory'])->group(function () {
        route::view('/login','Dashboard.stagiaire.login')->name('login');
        route::view('/register','Dashboard.stagiaire.register')->name('register');
        route::post('/create',[StagiaireController::class,'create'])->name('create');
        route::post('/check',[StagiaireController::class,'check'])->name('check');
    });
    
    route::middleware(['auth:stagiaire','PreventBackHistory'])->group(function () {
        route::get('/home',[StagiaireController::class,'home'])->name('home');
        route::post('/logout',[StagiaireController::class,'logout'])->name('logout');
        route::get('/infos',[StagiaireController::class,'infos'])->name('infos');  //
        route::post('/updatepersonal{stagiaire}',[StagiaireController::class,'updatePersonal'])->name('updatePersonal');  //
        route::get('/entretiens',[StagiaireController::class,'entretiens'])->name('entretiens'); //
        route::post('/confirmer',[StagiaireController::class,'confirmer'])->name('confirmer'); //
        route::post('/confirmerDemande',[StagiaireController::class,'confirmerDemande'])->name('confirmerDemande'); //
        route::get('/settings',[StagiaireController::class,'settings'])->name('settings'); //
        route::post('/changepassword',[StagiaireController::class,'changepassword'])->name('changepassword'); //
        route::get('/candidatures',[StagiaireController::class,'candidatures'])->name('candidatures'); //
        route::post('/feedback',[StagiaireController::class,'feedback'])->name('feedback'); //
        route::get('/postuler{offre}',[offresController::class,'postuler'])->name('postuler');
        
        
        route::prefix('school')->name('school.')->group(function () {
            
            route::get('/create',[schoolController::class,'create'])->name('create');
            route::get('/edit{school}',[schoolController::class,'edit'])->name('edit');
            route::post('/store',[schoolController::class,'store'])->name('store');
            route::post('/update{school}',[schoolController::class,'update'])->name('update');
            route::post('/delete',[schoolController::class,'destroy'])->name('delete');
            
            
        });
        
        route::prefix('experience')->name('experience.')->group(function () {
            
            route::get('/create',[experienceController::class,'create'])->name('create');
            route::get('/edit{experience}',[experienceController::class,'edit'])->name('edit');
            route::post('/store',[experienceController::class,'store'])->name('store');
        route::post('/update{experience}',[experienceController::class,'update'])->name('update');
        route::post('/delete',[experienceController::class,'destroy'])->name('delete');
        
        
        
    });
    route::prefix('demande')->name('demande.')->group(function () {
        
        route::get('/dashboard',[demandeController::class,'dashboard'])->name('dashboard');
        route::get('/create',[demandeController::class,'create'])->name('create');
        route::get('/edit{demande}',[demandeController::class,'edit'])->name('edit');
        route::post('/store',[demandeController::class,'store'])->name('store');
        route::post('/update{demande}',[demandeController::class,'update'])->name('update');
        route::post('/delete{demande}',[demandeController::class,'destroy'])->name('delete');
        
        
        
    });
    
});


});

route::prefix('entreprise')->name('entreprise.')->group(function () {
    
    route::middleware(['guest:entreprise','PreventBackHistory'])->group(function () {
        route::view('/login','Dashboard.entreprise.login')->name('login');
        route::get('/register',[EntrepriseController::class,'register'])->name('register');
        route::post('/create',[EntrepriseController::class,'create'])->name('create');
        route::post('/check',[EntrepriseController::class,'check'])->name('check');
        
    });
    
    route::middleware(['auth:entreprise','PreventBackHistory'])->group(function () {
        route::get('/home',[EntrepriseController::class,'home'])->name('home'); //
        route::get('/entretiens',[EntrepriseController::class,'entretiens'])->name('entretiens'); //
        route::view('/settings','Dashboard.entreprise.settings')->name('settings'); //
        route::post('/logout',[EntrepriseController::class,'logout'])->name('logout');
        route::get('/infos',[EntrepriseController::class,'infos'])->name('infos');  //
        route::post('/update{entreprise}',[EntrepriseController::class,'update'])->name('update');  //
        route::post('/changepassword',[EntrepriseController::class,'changepassword'])->name('changepassword'); //
        route::post('/feedback',[EntrepriseController::class,'feedback'])->name('feedback'); //
        route::get('/convoquer{candidature}',[demandesController::class,'convoquer'])->name('convoquer');
        
        route::prefix('offre')->name('offre.')->group(function () { //

            route::get('/dashboard',[offreController::class,'dashboard'])->name('dashboard');
            route::get('/create',[offreController::class,'create'])->name('create');
            route::get('/edit{offre}',[offreController::class,'edit'])->name('edit');
            route::post('/store',[offreController::class,'store'])->name('store');
            route::post('/update{offre}',[offreController::class,'update'])->name('update');
            route::post('/delete{offre}',[offreController::class,'destroy'])->name('delete');
            
    
       
        });
        
      });



});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
