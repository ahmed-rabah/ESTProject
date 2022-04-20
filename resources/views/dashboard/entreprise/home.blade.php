<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->
   
    
    <title>Dashboard</title>
</head>
<body style="background-color:#E4E9F7;">
    
    @include('layouts/sidebarEntreprise')
    
    <section class="home-section" style="margin-top:70px; ">
   
    @include('layouts/navbarEntreprise')
     <!-- body -->
  
     <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:100px">
     <div class="row mt-4">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                    permession pour lancement des offres de stages</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">@if($entreprise->actif ==0) désactiver @elseif($entreprise->actif ==1) Activer @endif</div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                    nombre de mes offres</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{$countoffre}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div><div class="d-fex align-items-end justify-content-end"><a href="{{route('entreprise.offre.dashboard')}}" class="btn btn-primary" style=" border-radius: 17px 0;">mes offres</a></div>
        </div>
    </div>


<!-- Earnings (Monthly) Card Example -->


<!-- Content Row -->
</div>

<div class="row">
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1 text-center">
                    nombre des offres de stage</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div><div class="d-fex align-items-end justify-content-end"><a href="{{route('entreprise.offre.dashboard')}}" class="btn btn-primary" style=" border-radius: 17px 0;">voir les offres</a></div>
        </div>
    </div>

<!-- Pending Requests Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2 ">
        <div class="card-body ">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">
                    nombre des demandes de stage</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                </div>
               
            </div><div class="align-items-end "><a href="{{route('entreprise.offre.dashboard')}}" class="btn btn-primary" style=" border-radius: 17px 0;">voir les offres</a></div>
        </div>
        </div>
    </div>
</div>
</div>
    </div> <!-- /.container -->
    <!-- end body -->
   
    <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:30px">
     <div class="row mt-4">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                    nombre des comptes Stagiaires activeés </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                    nombre des stagiaires desactivés</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
        </div>
    </div>


<!-- Earnings (Monthly) Card Example -->


<!-- Content Row -->
</div>

<div class="row">
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1 text-center">
                    nombre des entreprises activés</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
        </div>
    </div>

<!-- Pending Requests Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2 ">
        <div class="card-body ">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-center">
                    nombre des entreprises desactivés</div>
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center"></div>
                </div>
               
            </div>
        </div>
        </div>
    </div>
</div>


</div>
    </div> <!-- /.container -->
    <!-- end body -->
   
  </section>

  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>