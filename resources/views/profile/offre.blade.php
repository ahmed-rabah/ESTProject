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
       
    <section class="" style="margin-top:70px;">
   @if(auth()->guard('entreprise')->check())  @include('layouts/navbarEntreprise')
    @elseif(auth()->guard('stagiaire')->check()) @include('layouts/navbarStagiaire')
    @elseif(auth()->guard('admin')->check()) @include('layouts/navbarAdmin')
    @else    @include('layouts/navbar')
   @endif
    <section style="background-color: #eee;">
  <div class="container py-5">
   

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
              @if($offre->entreprise->logo != '')
            <img src="{{asset('/storage/'.$offre->entreprise->logo)}}" alt="{{asset('pic/profile.png')}}" class="rounded-circle img-fluid" style="width: 150px;">
           @else 
           <img src="{{asset('/pic/entreprise.png')}}" alt="{{asset('pic/profile.png')}}" class="rounded-circle img-fluid" style="width: 150px;">
            @endif
            <h5 class="my-3">{{$offre->entreprise->nom_entreprise}}</h5>
            <p class="text-muted mb-1">{{$offre->entreprise->description}}</p> 
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">Nom de l'entreprise</p>
            </div>
              <div class="col-sm-8">
                  <p class="text-muted mb-0">{{$offre->entreprise->nom_entreprise}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-8">
                    <p class="text-muted mb-0">{{$offre->entreprise->email}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">domaine</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">{{$offre->entreprise->domaine->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">category</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">{{$offre->entreprise->category->name}}</p>
              </div>
            </div>
            <hr>    
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">telephone</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">{{$offre->entreprise->telephone}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-4">
                <p class="mb-0">adresse</p>
              </div>
              <div class="col-sm-8">
                <p class="text-muted mb-0">{{$offre->entreprise->adresse}}</p>
              </div>
            </div>
            <hr>
          </div>
        </div>
      </div>
      
      <div class="col-lg-8">
      @if(auth()->guard('stagiaire')->check())
                   
                   <div class="d-flex justify-content-start align-items-start mt-2">
                       <a href="{{route('stagiaire.postuler',$offre)}}" class="btn btn-primary">postuler</a>
                   </div>
                   @endif
        
                   <div class="container-fluid pt-3 " >
       <h4>l'offre</h4>
    
       <div class=" bg-white m-2 card border-left-primary  h-100 py-2 bg-primary p-2"   style=" box-shadow: inset 0 0 1em blue, 0 0 2em black;background-color: whitesmoke;">
              <div class="row">
                              
         
               <div class="col-xl-5">
            <div class="pt-2 d-flex justify-content-center align-items-center">
            <div class=" m-2 p-2" style="border:1px solid white;border-radius:25px;width: fit-content; background-color:rgb(200,20,100);">{{$offre->domaine->name}}</div>
            </div>
            <div class="pt-2 d-flex justify-content-center align-items-center">
            <div class=" m-2 p-2" style="border:1px solid white;border-radius :25px;width: fit-content; background-color:rgb(10,120,100);">{{$offre->type->name}}</div>
            </div>      
               </div> 
               
               <div class="col-xl-5">
               <?php  
                   $to = \Carbon\Carbon::createFromFormat('Y-m-d', $offre->dateFin);
                   $from = \Carbon\Carbon::createFromFormat('Y-m-d', $offre->dateDebut);
                   $d =$to->diffInMonths($from);
                   $w =$to->diffInWeeks($from);
                   ?>
               <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h4> @if($d ==0) {{$w}} semaines @else {{$d}} Mois @endif</h4>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h6>à Partir de : {{ date('d-M-y', strtotime($offre->dateDebut)) }}</h6>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h6>jusqu'à : {{ date('d-M-y', strtotime($offre->dateFin)) }}</h6>
                </div>

            </div>
            <div class="col-xl-2" style="padding-right:23px;">
            <div class="pt-3 d-flex justify-content-center align-items-center"></div>
            <div class="pt-3 d-flex justify-content-center align-items-center"></div>
            <div class="pt-3 d-flex justify-content-center align-items-center"></div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                    <img src="{{asset('pic/localisation.png')}}" width="25px" height="25px" alt="">
                   <h3> {{$offre->ville}}</h3>
                </div>
                
                
         
         </div>
           
           </div>
           <div class="d-flex justify-content-center align-items-center">
           <hr class="w-50"></div>
           <div class="text-center">{{$offre->description}}</div>
          <br>

          <a href="{{route('stagiaire_profile',$offre->entreprise)}}" class="btn btn-primary">voir profil de <strong>{{$offre->entreprise->prenom_entreprise}}</strong><a>
       

   
    </div>
    <div class="container card py-4 px-5" style=" box-shadow: inset 0 0 1em gold, 0 0 2em black;" id="offres">
        <h4>autres offres de <strong>{{$offre->entreprise->nom_entreprise}}</strong></h4>
           @foreach($offres as $offer)
           @if($offer->entreprise_id == $offre->entreprise_id)
          <div class="mb-2" style="border:1px solid black;background-color: whitesmoke;border-radius:25px;">
              
                  <div class="d-flex align-items-center justify-content-center p-1 m-0" style="padding-right:0; margin-right:0;">
                  @if($offer->entreprise->logo !='')
                  <a href="{{route('entreprise_profile',$offer->entreprise)}}"><img src="{{asset('/storage/'.$offer->entreprise->logo)}}" alt="" width="120px" height="120px" style="border-radius:50%;border:1px solid black;margin : 8px 0 2px 17px;" > </a>
                  @else
                  <a href="{{route('entreprise_profile',$offer->entreprise)}}"> <img src="{{asset('/pic/entreprise.png')}}" alt="" width="120px" height="120px" style="border-radius:50%;border:1px solid black;margin : 8px 0 2px 17px;" ></a>
                  @endif 
                </div>               
                <div class="d-flex align-items-center justify-content-center p-1 m-0">
                <a class="text-dark text-center"style="text-decoration:none;" href="{{route('entreprise_profile',$offer->entreprise)}}" data-toggle="tooltip" title="voir profile !"><strong>{{$offer->entreprise->nom_entreprise}}&nbsp;{{$offer->entreprise->nom_stagiaire}}</strong></a> &nbsp;&nbsp;<span class="text-danger">{{$offer->entreprise->diplome}}</span>
                                {{ Str::limit($offer->description, 119) }}</div>
                  <div class="d-flex align-items-center justify-content-center p-1 m-0" style="margin-left:0;padding-left:18px;">                
                <br>
               
                <div class="d-flex justify-content-center align-items-center">
                <div class=" m-2 p-2" style="border:1px solid white;border-radius:25px;width: fit-content; background-color:rgb(200,20,100);">{{$offer->domaine->name}}</div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                <div class=" m-2 p-2" style="border:1px solid white;border-radius :25px;width: fit-content; background-color:rgb(10,120,100);">{{$offer->type->name}}</div>
                </div>
              </div> 
               
               <div class="d-flex align-items-center justify-content-center p-1 m-0">
                   <?php  
                   $to = \Carbon\Carbon::createFromFormat('Y-m-d', $offer->dateFin);
                   $from = \Carbon\Carbon::createFromFormat('Y-m-d', $offer->dateDebut);
                   $d =$to->diffInMonths($from);
                   $w =$to->diffInWeeks($from);
                   ?>
               <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h4> @if($d ==0) {{$w}} semaines @else {{$d}} Mois @endif &nbsp;: &nbsp;</h4>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h6>à Partir de : {{ date('d-M-y', strtotime($offer->dateDebut)) }} &nbsp;</h6>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h6>jusqu'à : {{ date('d-M-y', strtotime($offer->dateFin)) }}</h6>
                </div>

            </div>
            <div class="d-flex align-items-center justify-content-center p-1 m-0">
                <div class="pt-3 d-flex justify-content-center align-items-center">
                    <img src="{{asset('pic/localisation.png')}}" width="25px" height="25px" alt="">
                   <h3> {{$offer->ville}}</h3>
                </div>
                
                    @if(auth()->guard('stagiaire')->check())
                    <div class="d-flex justify-content-center align-items-center mt-2">
                  <a href="{{route('stagiaire.postuler',$offer)}}" class="btn btn-success">postuler</a>
              </div>
                    @endif
              
                <div class="d-flex justify-content-center align-items-center mt-2">
                  <a href="{{route('offre',$offer)}}" class="btn btn-primary " >voir plus</a>
                  
              </div>
            </div>
         
           
           </div>
          <br>
          @endif
           @endforeach
       </div>
       
  </div>
</div>

    </section>
   



  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>
