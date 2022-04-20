<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <style>
     .offre{
  border:1px solid black;
  background-color: whitesmoke;
  border-radius:25px;
}
.offre:hover{ 
  
  border:2px solid blue;
  background-color: rgb(236, 235, 242);
  border-radius:25px;
}
    </style> 
    <title>offres</title>
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
          <form action="{{route('offres')}}" method="get">
            @csrf
            <div class="d-flex justify-content-around align-items-around pb-2">
            <div><select class="form-select" aria-label="Default select example" id="domaine" name="domaine">
              <option value="" selected>domaine</option>
              @foreach($domaines as $domaine)
              <option value="{{$domaine->id}}"  @if($request->domaine == $domaine->id) selected @endif>{{$domaine->name}}</option>
              @endforeach
              </select>
            </div>
            <div><select class="form-select" aria-label="Default select example" id="type" name="type">
              <option value="" selected>type</option>
              @foreach($types as $type)
              <option value="{{$type->id}}"  @if($request->type == $type->id) selected @endif>{{$type->name}}</option>
              @endforeach
              </select>
            </div>
            <div>
              <select class="form-select" aria-label="Default select example" id="renumeration" name="renumeration">
                <option value="" selected>rénumération</option>
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
       <h3>les offres de stages</h3>
 
       <div class="container" id="offres">
           @forelse($offres as $offre)
           @if($offre->entreprise->actif)
          <div class="offre" style="">   
          <div class="row pt-2">
                  <div class="col-xl-3 justify-content-start text-start" >
                  @if($offre->entreprise->logo !='')
                  <a href="{{route('entreprise_profile',$offre->entreprise)}}"><img src="{{asset('/storage/'.$offre->entreprise->logo)}}" alt="" width="150px" height="150px" style="border-radius:50%;border:1px solid black;margin : 8px 0 2px 0px;" > </a>
                  @else
                  <a href="{{route('entreprise_profile',$offre->entreprise)}}"> <img src="{{asset('/pic/entreprise.png')}}" alt="" width="150px" height="150px" style="border-radius:50%;border:1px solid black;margin : 8px 0 2px 17px;" ></a>
                  @endif 
                </div>               
         
                  <div class="col-xl-6" >                
                <a class="text-dark text-center"style="text-decoration:none;" href="{{route('entreprise_profile',$offre->entreprise)}}" data-toggle="tooltip" title="voir profile !"><strong>{{$offre->entreprise->nom_entreprise}}</strong></a> &nbsp;&nbsp;<span class="text-danger">{{$offre->entreprise->diplome}}</span>
                <br>
                <div class="">{{ Str::limit($offre->description, 160) }}</div>
                <div class="d-flex justify-content-start align-items-start">
                <div class="p-1" style="border:1px solid white;border-radius:25px;width: fit-content; background-color:rgb(200,20,100);">{{$offre->domaine->name}}</div>
                </div>
                <div class="d-flex justify-content-start align-items-start">
                <div class="p-1 text-white" style="border:1px solid white;border-radius :25px;width: fit-content; background-color:rgb(10,120,100);">{{$offre->type->name}}</div>
                </div>
              </div> 
               
               <div class="col-xl-3">
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
                   <h6> de : {{ date('d-M-y', strtotime($offre->dateDebut)) }}</h6>
                </div>
                <div class="pt-3 d-flex justify-content-center align-items-center">
                   <h6>jusqu'à : {{ date('d-M-y', strtotime($offre->dateFin)) }}</h6>
                </div>
                <div class="pt-1 pb-0 m-0 text-center">
                   <h6 class="m-0 p-0">Rénumération :</h6><h6 class="m-0 p-0"><strong>@if($offre->renumeration==1) oui <img src="{{asset('pic/check.png')}}" width="20px" alt=""> @else non <img src="{{asset('pic/nocheck.png')}}" width="20px" alt="">@endif</strong></h6>
                 </div>
            </div>
           
         </div>
           <div class="row">
          <div class="col-xl-6">
           <div class="pt-1 px-4 d-flex justify-content-center align-items-center">
                    <img src="{{asset('pic/localisation.png')}}" width="25px" height="25px" alt="" class="mb-2">
                   <h5> {{$offre->ville}}</h5>
                </div> 
                </div>
           <div class="col-xl-3">               
                    @if(auth()->guard('stagiaire')->check())
                    @foreach ($candidatures as $candidature)
                    <?php $i =0 ; ?>
                    @if($candidature->stagiaire == auth()->guard('stagiaire')->user() && $candidature->offre_id ==$offre->id)
                    <?php $i =1 ; ?>
                    @break
                    @endif
                    @endforeach
                    <?php if($i != 1){  ?> 
                    <div class="d-flex justify-content-center align-items-center mt-2">
                      <a href="{{route('stagiaire.postuler',$offre)}}" class="btn btn-success">postuler</a>
                    </div>
                    <?php } else {  ?> 
                      <div class="d-flex justify-content-center align-items-center mt-2">
                      <div class="btn btn-secondary">dejà postuler</div>
                    </div>
                  <?php  }  ?>
                    @endif
              </div>     
              <div class="col-xl-3 pb-3">
                <div class="d-flex justify-content-center align-items-center mt-2">
                  <a href="{{route('offre',$offre)}}" class="btn btn-primary " >voir plus</a>
                  </div> 
              
            </div>
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
                  <div class="card-header bg-info"><strong>offres   </strong></div>
                  <div class="card-body">
                  <div id="value2">0</div>
                  </div>
              </div> 
              <div class=" bg-white m-2 card border-right-primary shadow h-100 py-2 bg-primary">
                <div class="card-header bg-info"><strong>demandes   </strong></div>
                <div class="card-body">
                  <div id="value">0</div>
                </div>
              </div> 
              
              <!-- domaines types .... stats -->
            </div>
   </div>

   
</section>
</div>
   
 

  

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
