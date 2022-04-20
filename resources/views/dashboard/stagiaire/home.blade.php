<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  
    <title>Dashboard</title>
</head>
<body style="background-color:#E4E9F7;">
    
    @include('layouts/sidebarStagiaire')
    
    <section class="home-section" style="margin-top:70px;">
   
    @include('layouts/navbarStagiaire')
  
    
    <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:100px">
    <div class="row mt-4">
    <div class="col">
    <div class="card border-left-primary shadow h-100 py-2 bg-primary"><a href="{{route('stagiaire.school.create')}}" class="btn btn-primary">ajouter une formation </a>
      
      </div>
    </div>
    <div class="col">
    <div class="card border-left-primary shadow h-100 py-2 bg-primary"><a href="{{route('stagiaire.demande.create')}}" class="btn btn-primary">créer une demande</a>
      </div>
    </div>
    <div class="col">
    <div class="card border-left-primary shadow h-100 py-2 bg-primary"><a href="{{route('stagiaire.experience.create')}}" class="btn btn-primary">ajouter une experience</a>
      
      </div>
    </div>
    </div>
    <div class="row mt-4">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                    permession pour postuler aux stages</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">@if($stagiaire->actif ==0) désactiver @elseif($stagiaire->actif ==1) Activer @endif</div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
<div class="row mt-4">
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                    nombre de mes demandes</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{$countdemande}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div><div class="d-fex align-items-end justify-content-end"><a href="{{route('stagiaire.demande.dashboard')}}" class="btn btn-primary" style=" border-radius: 17px 0;">mes demandes</a></div>
        </div>
    </div>


<!-- Earnings (Monthly) Card Example -->


<!-- Content Row -->



<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1 text-center">
                    nombre de mes candidatures</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{$countcandidature}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div><div class="d-fex align-items-end justify-content-end"><a href="{{route('stagiaire.candidatures')}}" class="btn btn-primary" style=" border-radius: 17px 0;">mes candidatures</a></div>
        </div>
    </div>
</div>
<div class="row mt-4">
<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-success shadow h-100 py-2 ">
        <div class="card-body ">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">
                    entretiens</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{$countentretien}}</div>
                </div>
                </div>
            </div><div class="align-items-end m-2"><a href="{{route('stagiaire.entretiens')}}" class="btn btn-primary" style=" border-radius: 17px 0;">mes entretiens</a></div>
        </div>
    </div>

<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                    parcours académiques </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{$countparcours}}</div>
                </div>
            <div class="align-items-end "><a href="{{route('stagiaire.infos')}}" class="btn btn-primary" style=" border-radius: 17px 0;">mon parcours académique</a></div>
                
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-md-4 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                    experiences proffessionnelles</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{$countexperience}}</div>
                </div>
             </div><div class="align-items-end "><a href="{{route('stagiaire.infos')}}" class="btn btn-primary" style=" border-radius: 17px 0;">mes experiences </a></div>
          </div>
       </div>




</div>


</div>
     <!-- /.container -->
    <!-- end body -->

  </section>


  
 


  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>


 
 