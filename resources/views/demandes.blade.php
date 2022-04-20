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
@if(auth()->guard('entreprise')->check())  @include('layouts/sidebarEntreprise')
  @elseif(auth()->guard('stagiaire')->check()) @include('layouts/sidebarStagiaire')
  @elseif(auth()->guard('admin')->check()) @include('layouts/sidebarAdmin')
  @endif
  
    
   @if(auth()->guard('entreprise')->check()) 
  <section class="home-section" style="background-color: #E4E9F7;margin-top:40px;">
      @include('layouts/navbarEntreprise')
    @elseif(auth()->guard('stagiaire')->check())
  <section class="home-section" style="background-color: #E4E9F7;margin-top:40px;">
    @include('layouts/navbarStagiaire')
    @elseif(auth()->guard('admin')->check()) 
  <section class="home-section" style="background-color: #E4E9F7;margin-top:40px;">
    @include('layouts/navbarAdmin')
    @else   
    <section  style="background-color: #E4E9F7;margin-top:40px;">
     @include('layouts/navbar')
   @endif
    <div class="container-fluid py-5 " >
    <div id="search filter" class="card me-2 p-2">
            <p><strong>filtrer les résultats</strong></p>
          <form action="{{route('demandes')}}" method="get">
       
            <div class="d-flex justify-content-around align-items-around pb-2">
            <div><select class="form-select" aria-label="Default select example" id="domaine" name="domaine">
              <option value="">domaine</option>
              @foreach($domaines as $domaine)
              <option value="{{$domaine->id}}" @if($request->domaine == $domaine->id) selected @endif>{{$domaine->name}}</option>
              @endforeach
              </select>
            </div>
            <div><select class="form-select" aria-label="Default select example" id="type" name="type">
              <option value="">type</option>
              @foreach($types as $type)
              <option value="{{$type->id}}" @if($request->type == $type->id) selected @endif>{{$type->name}}</option>
              @endforeach
              </select>
            </div>
            <div>
              <select class="form-select" aria-label="Default select example" id="renumeration" name="renumeration">
                <option value="">rénumération</option>
                <option value="0" >non</option>
                <option value="1" >oui</option>
               </select>
            </div>
          
            <div class="form-group">
              <input type="submit" value="rechercher" class="btn btn-primary">
            </div>
          </div>
        </form>
   </div>
   <div class="row">
       <div class="col-md-8 bg-white m-2 card border-left-primary  h-100 py-2 bg-primary"  style="box-shadow: 10px 10px 5px lightblue;background-color: whitesmoke;">
       <h3>les demandes de stages</h3>
       <!-- recherche -->
       <div class="container" id="demandes">
         @if(Session::get('success'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{Session::get('success')}}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div> 
                   @endif
           @forelse($demandes as $demande)
           @if($demande->stagiaire->actif == 1)
          <div class="" style="border:1px solid black;background-color: whitesmoke;border-radius:25px;">
              <div class="row">
                  <div class="col-xl-3 text-start" style="padding-right:0; margin-right:0;">
                  @if($demande->stagiaire->photo != '')
                  <a href="{{route('stagiaire_profile',$demande->stagiaire)}}"><img src="{{asset('/storage/'.$demande->stagiaire->photo)}}"  width="150px" height="150px" style="border-radius:50%;margin : 8px 0 2px 17px;" > </a>
                  @else
                  <a href="{{route('stagiaire_profile',$demande->stagiaire)}}"> <img src="{{ asset('/pic/profile.png') }}" alt="" width="150px" height="150px" style="border-radius:50%;margin : 8px 0 2px 17px;" ></a>
                  @endif 
                </div>               
         
                  <div class="col-xl-6" style="margin-left:0;padding-left:18px;">                
                <a class="text-dark text-center"style="text-decoration:none;" href="{{route('stagiaire_profile',$demande->stagiaire_id)}}" data-toggle="tooltip" title="voir profile !"><strong>{{$demande->stagiaire->prenom_stagiaire}}&nbsp;{{$demande->stagiaire->nom_stagiaire}}</strong></a> &nbsp;&nbsp;<span class="text-danger">{{$demande->stagiaire->diplome}}</span>
                <br>
                <div class="">{{ Str::limit($demande->description, 250) }}</div>
                <div class=" m-2 p-2" style="border:1px solid white;border-radius:25px;width: fit-content; background-color:rgb(200,20,100);">{{$demande->domaine->name}}</div>
                <div class=" m-2 p-2" style="border:1px solid white;border-radius :25px;width: fit-content; background-color:rgb(10,120,100);">{{$demande->type->name}}</div>
               </div> 
               
               <div class="col-xl-3">
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
                   <h6> de : {{ date('d-M-y', strtotime($demande->dateDebut)) }}</h6>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h6>jusqu'à : {{ date('d-M-y', strtotime($demande->dateFin)) }}</h6>
                </div>
                <div class="pt-3 text-center">
                   <h6 class="p-0 m-0">Rénumération :</h6><h6 class="p-0 m-0"><strong>@if($demande->renumeration==1) oui <img src="{{asset('pic/check.png')}}" width="20px" alt="">@else non <img src="{{asset('pic/nocheck.png')}}" width="20px" alt="">@endif</strong></h6>
                </div>                
            </div>
           </div>
           <div class="row">
             <div class="col-xl-3">
             <div class="px-5 pt-2 pb-0 d-flex justify-content-center align-items-center">
                    <img src="{{asset('pic/localisation.png')}}" width="25px" height="25px" alt="">
                   <h5> {{$demande->ville}}</h5>
                </div>
             </div>
           <div class="col-xl-3 mb-2">               
                    @if(auth()->guard('entreprise')->check())
                @if($demande->stagiaire->CV !== '')
            
            <div class="d-flex justify-content-center align-items-center mt-2"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              voir CV
            </button></div>
              @endif
              </div>
              @foreach ($entretiens as $entretien)
                    <?php $x =0 ; ?>
                    @if($entretien->entreprise_id == auth()->guard('entreprise')->user()->id && $entretien->demande_id ==$demande->id)
                    <?php $x =1 ; ?>
                    @break
                    @endif
                @endforeach
                    <?php if($x != 1){  ?> 
              <div class="col-xl-3">
              <div class="d-flex justify-content-center align-items-center mt-2">
                  <a href="{{route('entreprise.convoquer',$demande)}}" class="btn btn-success px-1">convoquer</a>
              </div>
              </div>
              <?php } else {  ?> 
                <div class="col-xl-3">
              <div class="d-flex justify-content-center align-items-center mt-2">
                  <div class="btn btn-secondary px-1">deja convoquer</div>
              </div>
              </div>
              <?php  }  ?>
              <div class="col-xl-3">
                <div class="d-flex justify-content-center align-items-center mt-2">
                  <a href="{{route('demande',$demande)}}" class="btn btn-primary " >voir plus</a>
                </div>
              </div>
              @else
              <div class="">
                <div class="d-flex justify-content-center align-items-center mt-2">
                  <a href="{{route('demande',$demande)}}" class="btn btn-primary " >voir plus</a>
                </div>
              </div>
            </div>
                 @endif
                  
                  
              
              </div>
          </div> 
          
          <br>
          @endif
          @empty
          <h5>pas de résultats</h5>
           @endforelse
       </div>
       </div>
       <div class="col-md-3 bg-white m-2 card border-right-primary  h-100 py-2 bg-primary" style="box-shadow: 10px 10px 5px lightblue;">
       <div class=" bg-white m-2 card border-right-primary shadow h-100 py-2 bg-primary">
                <div class="card-header bg-info"><strong>Domaines</strong></div>
                <div class="card-body">
                    @foreach($mindomaines as $domaine)
                    <p style="padding:0;margin:0;">-{{$domaine->name}}</p>
                    @endforeach
                </div>
            </div>
            <div class=" bg-white m-2 card border-right-primary shadow h-100 py-2 bg-primary">
                <div class="card-header bg-info"><strong>types</strong></div>
                <div class="card-body">
                    @foreach($types as $type)
                    <p style="padding:0;margin:0;">-{{$type->name}}</p>
                    @endforeach
                </div>
            </div>    
            <div class=" bg-white m-2 card border-right-primary shadow h-100 py-2 bg-primary">
                <div class="card-header bg-info"><strong>demandes   </strong></div>
                <div class="card-body">
                <div id="value">0</div>
                </div>
            </div> 
            <div class=" bg-white m-2 card border-right-primary shadow h-100 py-2 bg-primary">
                <div class="card-header bg-info"><strong>offres   </strong></div>
                <div class="card-body">
                <div id="value2">0</div>
                </div>
            </div> 
            
       <!-- domaines types .... stats -->
       </div>
   </div>

   
  </div>
</div>
   
 @if(isset($demande))
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
  @endif

  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
<script>
    function animateValue(obj, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    obj.innerHTML = Math.floor(progress * (end - start) + start);
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };
  window.requestAnimationFrame(step);
 }

 const obj = document.getElementById("value");
 animateValue(obj, 0, {{$x}}, 1000);
 
 const obj2 = document.getElementById("value2");
 animateValue(obj2, 0, {{$y}}, 1000);

 $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
$(document).ready(function(){
  $('[data-toggle="demandepage"]').tooltip();   
});
</script>
</body>
</html>
