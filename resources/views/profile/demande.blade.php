<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  
    <title>demandes</title>
</head>
<body style="background-color:#E4E9F7;">
       
    
   @if(auth()->guard('entreprise')->check())  @include('layouts/navbarEntreprise')
    @elseif(auth()->guard('stagiaire')->check()) @include('layouts/navbarStagiaire')
    @elseif(auth()->guard('admin')->check()) @include('layouts/navbarAdmin')
    @else    @include('layouts/navbar')
   @endif
    <div style="background-color: #E4E9F7;margin-top:40px;">

        <section style="background-color: #eee;">
            <div class="container py-5"> 
  <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            @if($demande->stagiaire->photo)
            <img src="{{asset('/storage/'.$demande->stagiaire->photo)}}" alt="{{asset('pic/profile.png')}}" class="rounded-circle img-fluid" style="width: 150px;">
            @else
            <img src="{{asset('/pic/profile.png')}}" alt="{{asset('pic/profile.png')}}" class="rounded-circle img-fluid" style="width: 150px;">
            @endif
            <h5 class="my-3">{{$demande->stagiaire->prenom_stagiaire}}&nbsp;&nbsp;{{$demande->stagiaire->nom_stagiaire}}</h5>
            <p class="text-muted mb-1">{{$demande->stagiaire->diplome}}</p>
            <p class="text-muted mb-1">{{$demande->stagiaire->description}}</p> 
          </div>
        </div>
        <div class="card mb-4 mb-lg-0 mt-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Nom Complet</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">{{$demande->stagiaire->prenom_stagiaire}}&nbsp;&nbsp;{{$demande->stagiaire->nom_stagiaire}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$demande->stagiaire->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">telephone</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">{{$demande->stagiaire->telephone}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Date de naissance</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">{{$demande->stagiaire->dateNaissance}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">gendre</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">{{$demande->stagiaire->gendre}}</p>
              </div>
            </div>
          </div>
        </div>
        @if(auth()->guard('entreprise')->check())
        <div class="card mb-4 mb-lg-0 mt-3">
          <div class="card-body p-0">
            <h5 class="text-center">CV</h5>
            @if($demande->stagiaire->CV !== '')
            <img src="{{asset('/storage/'.$demande->stagiaire->CV)}}" width="340px" height="440">
            <div class="d-flex justify-content-center align-items-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              voir et télécharger
            </button></div>
        @else <p style="color;grey;" class="text-center">CV n'est pas inclus </p> @endif </div>
        </div>
        @endif

        
    </div>

    <div class="col-lg-8">
      @if(auth()->guard('entreprise')->check())
      @foreach ($entretiens as $entretien)
                    <?php $x =0 ; ?>
                    @if($entretien->entreprise_id == auth()->guard('entreprise')->user()->id && $entretien->demande_id ==$demande->id)
                    <?php $x =1 ; ?>
                    @break
                    @endif
                @endforeach
                    <?php if($x != 1){  ?> 
                   <div class="d-flex justify-content-start align-items-start mt-2">
                       <a href="{{route('entreprise.convoquer',$demande)}}" class="btn btn-success">convoquer</a>
                   </div>
                   <?php } else {  ?> 
                <div class="col-xl-3">
              <div class="d-flex justify-content-center align-items-center mt-2">
                  <div class="btn btn-secondary px-1">deja convoquer</div>
              </div>
              </div>
              <?php  }  ?>
                   @endif

       <div class="container-fluid pt-3 " >
       <h4>la Demande</h4>
    
       <div class=" bg-white m-2 card border-left-primary  h-100 py-2 px-5 bg-primary"  style="box-shadow: 10px 10px 5px lightblue;background-color: whitesmoke;">
              <div class="row">
                              
         
               <div class="col-xl-5">
            <div class="pt-2 d-flex justify-content-center align-items-center">
            <div class=" m-2 p-2" style="border:1px solid white;border-radius:25px;width: fit-content; background-color:rgb(200,20,100);">{{$demande->domaine->name}}</div>
            </div>
            <div class="pt-2 d-flex justify-content-center align-items-center">
            <div class=" m-2 p-2" style="border:1px solid white;border-radius :25px;width: fit-content; background-color:rgb(10,120,100);">{{$demande->type->name}}</div>
            </div>      
               </div> 
               
               <div class="col-xl-5">
               <?php  
                   $to = \Carbon\Carbon::createFromFormat('Y-m-d', $demande->dateFin);
                   $from = \Carbon\Carbon::createFromFormat('Y-m-d', $demande->dateDebut);
                   $d =$to->diffInMonths($from);
                   $w =$to->diffInWeeks($from);
                   ?>
               <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h4> @if($d ==0) {{$w}} semaines @else {{$d}} Mois @endif</h4>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h6>à Partir de : {{ date('d-M-y', strtotime($demande->dateDebut)) }}</h6>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h6>jusqu'à : {{ date('d-M-y', strtotime($demande->dateFin)) }}</h6>
                </div>

            </div>
            <div class="col-xl-2" style="padding-right:23px;">
            <div class="pt-3 d-flex justify-content-center align-items-center"></div>
            <div class="pt-3 d-flex justify-content-center align-items-center"></div>
            <div class="pt-3 d-flex justify-content-center align-items-center"></div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                    <img src="{{asset('pic/localisation.png')}}" width="25px" height="25px" alt="">
                   <h3> {{$demande->ville}}</h3>
                </div>
                
                
         
         </div>
           
           </div>
           <div class="d-flex justify-content-center align-items-center">
           <hr class="w-50"></div>
           <div class="text-center">{{$demande->description}}</div>
          <br>

          <a href="{{route('stagiaire_profile',$demande->stagiaire)}}" class="btn btn-primary">voir profil de <strong>{{$demande->stagiaire->prenom_stagiaire}} &nbsp;{{$demande->stagiaire->nom_stagiaire}}</strong><a>
       

   
    </div>
  </div>


        
    </div>
 
</section>
</div>




 
   
 
<div class="modal" id="myModal">
  <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <img src="{{ asset('/storage/'.$demande->stagiaire->CV)}}" alt="" width="100%" height="100%">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <a href="{{route('downloadCV',$demande->stagiaire)}}" type="button" class="btn btn-success" >telecherger</a>
      </div>

    </div>
  </div>
</div>
  

  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 

</body>
</html>
