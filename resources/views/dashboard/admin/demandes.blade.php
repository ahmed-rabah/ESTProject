<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">  
    <title>demandes admin</title>
</head>
<body style="background-color:#E4E9F7;">
    
    @include('layouts/sidebarAdmin')
    
    <section class="home-section" style="margin-top:70px;">
   
    @include('layouts/navbarAdmin')
  
    <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:100px">
           <div class="card m-3" style="border-radius:20px;">
              <div class="card-header " style="border-radius:40px 0;background-color:#f0f0f0;border: 1px solid grey">
                  <h4 class="">les demandes de stages :</h4>
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
                <table class="table table-dark table-hover text-center">
                    <thead>
                        <th>stagiaire</th>
                        <th>type de stage</th>
                        <th>domaine de stage</th>
                        <th>ville de stage</th>
                        <th>date de debut</th>
                        <th>date de fin</th>
                        <th>renumération</th>
                        <th>actions</th>

                    </thead>
                    <tbody>
                    @foreach ($demandes as $demande)
                          <tr>
                              <th>@foreach ($stagiaires as $stagiaire)
                                  @if($stagiaire->id == $demande->stagiaire_id)
                                  {{$stagiaire->prenom_stagiaire}} &nbsp; {{$stagiaire->nom_stagiaire}}
                                  @endif
                                  @endforeach</th>
                              <td>{{ $demande->type->name }}</td>
                              <td>{{ $demande->domaine->name }}</td>
                              <td>{{ $demande->ville }}</td>
                              <td>{{ $demande->dateDebut }}</td>
                              <td>{{$demande->dateFin }}</td>
                              <td>@if($demande->renumeration==1) oui @elseif($demande->renumeration==0) non @endif</td>
                              <td><div class="d-flex"><form action="{{route('admin.deletedemandes',$demande)}}" method="post">  @csrf <input type="submit" value="supprimer" class="btn btn-danger"></form></div></td>
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


 
 