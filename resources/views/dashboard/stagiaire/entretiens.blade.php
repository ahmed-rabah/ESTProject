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
   
    <<section class="home-section" style="margin-top:70px;">
   
   @include('layouts/navbarStagiaire')
 
   <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:100px">
          <div class="card m-3" style="border-radius:20px;">
             <div class="card-header " style="border-radius:40px 0;background-color:#f0f0f0;border: 1px solid grey">
                 <h4 class="">mes entretiens d'après les offres :</h4>
               </div> <!-- header-card -->
           <div class="card-body">
           @if(Session::get('success'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{Session::get('success')}}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div> 
                   @endif
                   @if(Session::get('fail'))
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
                     {{Session::get('fail')}}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div> 
                   @endif
               <table class="table table-success table-hover text-center">
                   <thead>
                       <th>nom de l'entreprise</th>
                       <th>type de stage</th>
                       <th>domaine de stage</th>
                       <th>ville de stage</th>
                       <th>date de debut</th>
                       <th>date de fin</th>
                       <th>renumération</th>
                      <th>l'offre</th>
                      <th>confirmer</th>
                   </thead>
                   <tbody>
                   @foreach ($entretienOffres as $entre)
                         <tr>
                             <td>{{$entre->offre->entreprise->nom_entreprise}}</td>
                           
                             <td>{{ $entre->offre->type->name }}</td>
                             <td>{{ $entre->offre->domaine->name }}</td>
                             <td>{{ $entre->offre->ville }}</td>
                             <td>{{ $entre->offre->dateDebut }}</td>
                             <td>{{$entre->offre->dateFin }}</td>
                             <td>@if($entre->offre->renumeration==1) oui @elseif($entre->offre->renumeration==0) non @endif</td>
                            <td><a href="{{route('offre',$entre->offre)}}" class="btn btn-primary">voir</a></td>
                            <td>@if($entre->accepter ==1) <p class="m-0 p-0">oui</p> <img src="{{asset('/pic/check.png')}}" class="m-0 p-0" width="30px" alt=""> @else 
                            <p class="m-0 p-0">pas encore</p> <form  action="{{route('stagiaire.confirmer')}}" class="btn btn-success" method="post">@csrf
                                <input type="number" name="id" value="{{$entre->id}}"  class="d-none"><input type="number" name="offre_id" value="{{$entre->offre_id}}"  class="d-none"><input type="number" name="stagiaire_id" value="{{$entre->stagiaire_id}}" class="d-none"><input type="submit" value="confirmer"  class="btn btn-success p-0"></form>@endif</td>
                            </tr>
                   @endforeach

                   </tbody>
               </table> 

               
           </div> <!-- body-card -->
           <div class="card-footer">
              
           </div> <!-- footer-card -->
          </div> <!-- /.card-->

          <div class="card m-3 py-4" style="border-radius:20px;">
             <div class="card-header " style="border-radius:40px 0;background-color:#f0f0f0;border: 1px solid grey">
                 <h4 class="">mes entretiens d'après les demandes :</h4>
               </div> <!-- header-card -->
           <div class="card-body">
          
               <table class="table table-primary table-hover text-center">
                   <thead>
                       <th>nom de l'entreprise</th>
                       <th>type de stage</th>
                       <th>domaine de stage</th>
                       <th>ville de stage</th>
                       <th>date de debut</th>
                       <th>date de fin</th>
                       <th>renumération</th>
                      <th>la demande</th>
                      <th>confirmer</th>
                   </thead>
                   <tbody>
                   @foreach ($entretienDemandes as $dem)
                         <tr>
                             <td>{{$dem->entreprise->nom_entreprise}}</td>
                           
                             <td>{{ $dem->demande->type->name }}</td>
                             <td>{{ $dem->demande->domaine->name }}</td>
                             <td>{{ $dem->demande->ville }}</td>
                             <td>{{ $dem->demande->dateDebut }}</td>
                             <td>{{$dem->demande->dateFin }}</td>
                             <td>@if($dem->demande->renumeration==1) oui @elseif($dem->demande->renumeration==0) non @endif</td>
                            <td><a href="{{route('demande',$dem->demande)}}" class="btn btn-primary">voir</a></td>
                            <td>@if($dem->accepter ==1) <p class="m-0 p-0">oui</p> <img src="{{asset('/pic/check.png')}}" class="m-0 p-0" width="30px" alt=""> @else <p class="m-0 p-0">pas encore</p><form  action="{{route('stagiaire.confirmerDemande')}}" class="btn btn-success" method="post">@csrf
                                <input type="number" name="id" value="{{$dem->id}}"  class="d-none"><input type="number" name="demande_id" value="{{$dem->demande_id}}"  class="d-none"><input type="number" name="entreprise_id" value="{{$dem->entreprise_id}}" class="d-none"><input type="submit" value="confirmer"  class="btn btn-success p-0"></form>@endif</td>

                            </tr>
                   @endforeach

                   </tbody>
               </table> 

               
           </div> <!-- body-card -->
           <div class="card-footer">
              
           </div> <!-- footer-card -->
          </div> <!-- /.card-->
   </div> <!-- /.container -->

 </section>



  
 


  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>


 
 