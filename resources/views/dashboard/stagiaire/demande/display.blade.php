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
    
    <section class="home-section" style="margin-top:70px;">
   
    @include('layouts/navbarStagiaire')
  
    <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:100px">
           <div class="d-flex justify-content-end align-items-end"><a href="{{route('stagiaire.demande.create')}}" class="btn btn-primary mt-2" style="border-radius:30px 0px">créer une nouvelle demande</a></div>
           <div class="card m-3" style="border-radius:20px;">
              <div class="card-header " style="border-radius:40px 0;background-color:#f0f0f0;border: 1px solid grey">
                  <h4 class="">mes demandes de stages :</h4>
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
                        <th>actions</th>

                    </thead>
                    <tbody>
                    @foreach ($demandes as $demande)
                          <tr>
                            <?php $your="loremloremloremloremloremloremloremloremloremloremloremlorem"; ?>
                              <td>{{ $demande->type->name }}</td>
                              <td>{{ $demande->domaine->name }}</td>
                              <td>{{ $demande->ville }}</td>
                              <td>{{ $demande->dateDebut }}</td>
                              <td>{{$demande->dateFin }}</td>
                              <td>@if($demande->renumeration==1) oui @elseif($demande->renumeration==0) non @endif</td>
                              <td>{{ Str::limit($demande->description, 10) }}</td>
                              <td><div class="d-flex"><a href="{{route('stagiaire.demande.edit',$demande)}}" class="btn btn-primary">modifier</a><form action="{{route('stagiaire.demande.delete',$demande)}}" method="post">  @csrf <input type="submit" value="supprimer" class="btn btn-danger"></form></div></td>
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


 
 