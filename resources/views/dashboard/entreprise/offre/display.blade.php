<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  
    <title>mes offres de stage </title>
</head>
<body style="background-color:#E4E9F7;">
    
    @include('layouts/sidebarEntreprise')
    
    <section class="home-section" style="margin-top:70px;">
   
    @include('layouts/navbarEntreprise')
  
    <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:100px">
           <div class="d-flex justify-content-end align-items-end"><a href="{{route('entreprise.offre.create')}}" class="btn btn-primary mt-2" style="border-radius:30px 0px">créer une nouvelle offre</a></div>
           <div class="card m-3" style="border-radius:20px;">
              <div class="card-header " style="border-radius:40px 0;background-color:#f0f0f0;border: 1px solid grey">
                  <h4 class="">mes offres de stages :</h4>
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
                        <th>type de stage</th>
                        <th>domaine de stage</th>
                        <th>ville de stage</th>
                        <th>date de debut</th>
                        <th>date de fin</th>
                        <th>renumération</th>
                        <th>description</th>
                        <th>liste des candidats</th>
                        <th>actions</th>
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
                              <td>    {{ Str::limit($offre->description, 15) }}</td>
                              <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                                liste
                              </button></td>
                              <td><div class="d-flex"><a href="{{route('entreprise.offre.edit',$offre)}}" class="btn btn-primary">modifier</a><form action="{{route('entreprise.offre.delete',$offre)}}" method="post">  @csrf <input type="submit" value="supprimer" class="btn btn-danger"></form></div></td>
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


  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">liste des candidats pour l'offre</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-warning table-hover text-center">
          <thead>
            <th>photo</th>
            <th>nom Stagiaire</th>
            <th>email</th>
            <th>telephone</th>
            <th>convoquer pour stage</th>
          </thead>
          <tbody>
            @foreach ($candidatures as $candidature)
           
            @if($offre->id == $candidature->offre->id)
            @foreach ($entretienOffres as $intern)
            @php
            $x=0
            @endphp
            @if($candidature->offre_id == $intern->offre_id && $candidature->stagiaire_id == $intern->stagiaire_id) 
            @php
            $x=1
            @endphp
              @break
              @endif
              @endforeach
             <tr>
                <td>@if($candidature->stagiaire->photo !='') <img src="{{ asset('/storage/'.$candidature->stagiaire->photo) }}" alt="" height="60px"  width="60px"> @else <img src="{{ asset('/pic/profile.png')}}" height="60px"  width="60px" alt=""> @endif</td>
                <td>{{$candidature->stagiaire->prenom_stagiaire}}&nbsp;{{$candidature->stagiaire->nom_stagiaire}}</td>
                <td>{{$candidature->stagiaire->email}}</td>
                <td>{{$candidature->stagiaire->telephone}}</td>
            
                <td>@if($x == 0)<a href="{{route('entreprise.convoquer',$candidature)}}" class="btn btn-primary">convoquer</a>@else <div class="btn btn-secondary">déjà convoque</div>@endif</td>
              </tr>  
              @endif
             @endforeach
              </tbody>
            </table>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

 


  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>


 
 