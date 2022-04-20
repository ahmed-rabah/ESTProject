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
            @if($stagiaire->photo != '')
            <img src="{{asset('/storage/'.$stagiaire->photo)}}"  class="rounded-circle img-fluid" style="width: 150px;">
            @else
            <img src="{{asset('/pic/profile.png')}}" alt="{{asset('pic/profile.png')}}" class="rounded-circle img-fluid" style="width: 150px;">
            @endif
            <h5 class="my-3">{{$stagiaire->prenom_stagiaire}}&nbsp;&nbsp;{{$stagiaire->nom_stagiaire}}</h5>
            <p class="text-muted mb-1">{{$stagiaire->diplome}}</p>
            <p class="text-muted mb-1">{{$stagiaire->description}}</p> 
          </div>
        </div>
        @if(auth()->guard('entreprise')->check())
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <h5 class="text-center">CV</h5>
            @if($stagiaire->CV !== '')
            <img src="{{asset('/storage/'.$stagiaire->CV)}}" width="340px" height="440">
            <div class="d-flex justify-content-center align-items-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
              voir et télécharger
            </button></div>
        @else <p style="color;grey;" class="text-center">CV n'est pas inclus </p> @endif </div>
        </div>
        @endif
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom Complet</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$stagiaire->prenom_stagiaire}}&nbsp;&nbsp;{{$stagiaire->nom_stagiaire}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$stagiaire->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">telephone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$stagiaire->telephone}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date de naissance</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$stagiaire->dateNaissance}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">gendre</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$stagiaire->gendre}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
            <div class="card-header bg-primary">
                <h5>parcours académiques</h5>
                </div>
              <div class="card-body">
                @if($countparcours == 0)<p style="color:grey;">pas de parcours scolaires mentionnées</p> @endif
                @foreach($parcours as $parcour)
              <div class="card mb-4 mb-md-0">
            <div class="card-header bg-info">
                <h6>{{$parcour->typeDiplome}} | de {{$parcour->dateDebut}} à {{$parcour->dateFin}}</h6>
                </div>
              <div class="card-body">
                  <table class="table table-striped ">
                    <thead>
                    <tr>
                     <th>nom d'établissement</th>
                     <td>{{$parcour->nomEtablissement}}</td>
                  </tr>
                 <tr>
                    <th>Type de diplome</th>
                    <td>{{$parcour->typeDiplome}}</td>
                </tr>
               <tr>
                   <th>Filière</th>
                   <td>{{$parcour->filiere}}</td>
               </tr>
              <tr>
                  <th>status</th>
                  <td>{{$parcour->status}}</td>
              </tr>
              <tr>
                  <th>description</th>
                 <td>{{$parcour->description}}</td>
              </tr>
   
           </tbody>
                  </table>
              
                </div>
            </div>
            @endforeach
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
            <div class="card-header bg-primary">
               <h5> experience professionnelles</h5>
                </div>
            <div class="card-body">
            @if($countexperiences== 0)<p style="color:grey;">pas des experiences mentionnées</p> @endif
                @foreach($experiences as $experience)
            <div class="card mb-4 mb-md-0">
            <div class="card-header bg-info">
            <h6>{{$experience->post}} | de {{$experience->dateDebut}} à {{$experience->dateFin}}</h6>
               
                </div>
              <div class="card-body">
              <table class="table table-hover w-50" >  
       <tbody >
            <tr>
               <th>nom de place de l'éxperience</th>
               <td>{{$experience->nomExperience}}</td>
            </tr>
           <tr>
              <th>post</th>
              <td>{{$experience->post}}</td>
          </tr>
         <tr>
             <th>type de l'éxperience</th>
             <td>{{$experience->type}}</td>
         </tr>
         <tr>
            <th>date de debut</th>
            <td>{{$experience->dateDebut}}</td>
        </tr>
        <tr>
            <th>date de fin</th>
            <td>{{$experience->dateFin}}</td>
        </tr>
        <tr>
            <th>description</th>
           <td>{{$experience->description}}</td>
        </tr>

     </tbody>
    </table>  
              
                </div>
            </div>    
            @endforeach
                </div>
            </div>
          </div>
        </div>
        <div class="row"> 
           <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
            <div class="card-header bg-primary">
                <h5>mes demandes de stages</h5>
                </div>
                <?php $i=1; ?>
              <div class="card-body">
                @if($countdemandes == 0)<p style="color:grey;">pas de demandes</p> @endif
                @foreach($demandes as $demande)
              <div class="card mb-4 mb-md-0">
            <div class="card-header bg-info">
                <h6>demande n° <?php echo $i; $i=$i+1; ?> </h6>
                </div>
              <div class="card-body">
              <table class="table table-striped table-hover text-center">
                    <thead>
                        <th>type de stage</th>
                        <th>domaine de stage</th>
                        <th>ville de stage</th>
                        <th>date de debut</th>
                        <th>date de fin</th>
                        <th>renumération</th>
                        

                    </thead>
                    <tbody>
                    @foreach ($demandes as $demande)
                          <tr>
                              <td>{{ $demande->type->name }}</td>
                              <td>{{ $demande->domaine->name }}</td>
                              <td>{{ $demande->ville }}</td>
                              <td>{{ $demande->dateDebut }}</td>
                              <td>{{$demande->dateFin }}</td>
                              <td>@if($demande->renumeration==1) oui @elseif($demande->renumeration==0) non @endif</td>
                          </tr>
                    @endforeach

                    </tbody>
                </table> 
              
                </div>
            </div>
            @endforeach
                </div>
            </div>
          </div></div>
      </div>
    </div>
  </div>
</section>
   
 
<div class="modal" id="myModal">
  <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <img src="{{ asset('/storage/'.$stagiaire->CV)}}" alt="" width="100%" height="100%">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <a href="{{route('downloadCV',$stagiaire)}}" type="button" class="btn btn-success" >telecherger</a>
      </div>

    </div>
  </div>
</div>
  
 


  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>
