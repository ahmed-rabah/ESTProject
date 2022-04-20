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
                 <h4 class="">mes candidatures :</h4>
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
                      
                   </thead>
                   <tbody>
                   @foreach ($candidatures as $candidature)
                         <tr>
                             <td>{{$candidature->offre->entreprise->nom_entreprise}}</td>
                             <td>{{ $candidature->offre->type->name }}</td>
                             <td>{{ $candidature->offre->domaine->name }}</td>
                             <td>{{ $candidature->offre->ville }}</td>
                             <td>{{ $candidature->offre->dateDebut }}</td>
                             <td>{{$candidature->offre->dateFin }}</td>
                             <td>@if($candidature->offre->renumeration==1) oui @elseif($candidature->offre->renumeration==0) non @endif</td>
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


 
 