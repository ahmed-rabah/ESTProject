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
              @if($entreprise->logo != '')
            <img src="{{asset('/storage/'.$entreprise->logo)}}" alt="{{asset('pic/profile.png')}}" class="rounded-circle img-fluid" style="width: 150px;">
           @else 
           <img src="{{asset('/pic/entreprise.png')}}" alt="{{asset('pic/profile.png')}}" class="rounded-circle img-fluid" style="width: 150px;">
            @endif
            <h5 class="my-3">{{$entreprise->nom_entreprise}}</h5>
            <p class="text-muted mb-1">{{$entreprise->description}}</p> 
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom de l'entreprise</p>
            </div>
              <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$entreprise->nom_entreprise}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{$entreprise->email}}</p>
                </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">domaine</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$entreprise->domaine->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">category</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$entreprise->category->name}}</p>
              </div>
            </div>
            <hr>    
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">telephone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$entreprise->telephone}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">adresse</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$entreprise->adresse}}</p>
              </div>
            </div>
            <hr>
          </div>
        </div>
        
        <div class="row"> 
           <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
            <div class="card-header bg-primary">
                <h5>mes offres de stages</h5>
                </div>
                <?php $i=1; ?>
              <div class="card-body">
                @if($countoffres == 0)<p style="color:grey;">pas de offres</p> @endif
                @foreach($offres as $offre)
              <div class="card mb-4 mb-md-0">
            <div class="card-header bg-info">
            <h6>offre n° <?php echo $i; $i=$i+1; ?> </h6>
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
                    @foreach ($offres as $offre)
                          <tr>
                              <td>{{ $offre->type->name }}</td>
                              <td>{{ $offre->domaine->name }}</td>
                              <td>{{ $offre->ville }}</td>
                              <td>{{ $offre->dateDebut }}</td>
                              <td>{{$offre->dateFin }}</td>
                              <td>@if($offre->renumeration==1) oui @elseif($offre->renumeration==0) non @endif</td>
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
       <img src="{{ asset('/storage/'.$entreprise->CV)}}" alt="" width="100%" height="100%">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <a href="{{route('downloadCV',$entreprise)}}" type="button" class="btn btn-success" >telecherger</button>
      </div>

    </div>
  </div>
</div>
  
 


  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>
