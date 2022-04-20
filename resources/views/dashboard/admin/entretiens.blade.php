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
    
    @include('layouts/sidebarAdmin')
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
    <<section class="home-section" style="margin-top:70px;">
   
   @include('layouts/navbarAdmin')
 
   <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:100px">
  
   <div class="card m-3" style="border-radius:20px;">
             <div class="card-header " style="border-radius:40px 0;background-color:#f0f0f0;border: 1px solid grey">
                 <h4 class="">les entretiens d'après les demandes :</h4>
               </div> <!-- header-card -->
           <div class="card-body">
          
               <table class="table table-success table-hover text-center">
                   <thead>
                       <th>nom de stagiaire</th>
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
                   @foreach ($entretienDemandes as $entre)
                         <tr>
                        
                         <td>@if(isset($entre->demande->stagiaire->nom_stagiaire)){{$entre->demande->stagiaire->prenom_stagiaire}} &nbsp;{{$entre->demande->stagiaire->nom_stagiaire}} @endif</td>
                           <td>{{ $entre->entreprise->nom_entreprise }}</td>
                             <td>@if(isset($entre->demande->type->name)){{ $entre->demande->type->name }} @endif</td>
                             <td>@if(isset($entre->demande->domaine->name)) {{ $entre->demande->domaine->name }} @endif</td>
                             <td>@if(isset($entre->demande->ville)){{ $entre->demande->ville }} @endif</td>
                             <td>@if(isset($entre->demande->dateDebut)){{ $entre->demande->dateDebut }} @endif</td>
                             <td>@if(isset($entre->demande->dateFin)) {{$entre->demande->dateFin }}@endif </td>
                             <td>@if(isset($entre->demande->renumeration))@if($entre->demande->renumeration==1) oui @elseif($entre->demande->renumeration==0) non @endif @endif</td>
                            <td>@if(isset($entre->demande))<a href="{{route('demande',$entre->demande)}}" class="btn btn-primary">voir</a>@endif</td>
                            <td>@if($entre->accepter==1) oui @elseif($entre->accepter==0) non @endif</td>
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
                 <h4 class="">mes entretiens d'après les offres :</h4>
               </div> <!-- header-card -->
           <div class="card-body">
          
               <table class="table table-primary table-hover text-center">
                   <thead>
                       <th>nom de l'entreprise</th>
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
                   @foreach ($entretienOffres as $dem)
                         <tr>
                             <td>{{$dem->offre->entreprise->nom_entreprise}}</td>
                           
                             <td>{{ $dem->offre->entreprise->nom_entreprise }}</td>
                             <td>{{ $dem->offre->type->name }}</td>
                             <td>{{ $dem->offre->domaine->name }}</td>
                             <td>{{ $dem->offre->ville }}</td>
                             <td>{{ $dem->offre->dateDebut }}</td>
                             <td>{{$dem->offre->dateFin }}</td>
                             <td>@if($dem->offre->renumeration==1) oui @elseif($dem->offre->renumeration==0) non @endif</td>
                            <td><a href="{{route('offre',$dem->offre)}}" class="btn btn-primary">voir</a></td>
                            <td>@if($dem->accepter==1) oui @elseif($dem->accepter==0) non @endif</td>

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


 
 