<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> -->
   
    
    <title>stagiaires admin</title>
</head>
<body>
    
    @include('layouts/sidebarAdmin')
    
    <section class="home-section" style="margin-top:70px; ">
   
    @include('layouts/navbarAdmin')
     <!-- body -->
  
     <div class="container " style="background-color:E4E9F7; border: 2px solid white; border-radius: 20px; margin-top:100px">
           <div class="card m-3" style="border-radius:20px;">
              <div class="card-header " style="border-radius:40px 0;background-color:#f0f0f0;border: 1px solid grey">
                  <h4 class="">les stagiaires  :</h4>
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
                        <th>nom de l'stagiaire</th>
                        <th>date de naissance</th>
                        <th>gendre</th>
                        <th>CIN</th>
                        <th>email</th>
                        <th>telephone</th>
                        <th>diplome</th>
                        <th>partage des offres au publiques</th>
                        <th>changer la permission</th>
                        
                         
                    </thead>
                    <tbody>
                    @foreach ($stagiaires as $stagiaire)
                          <tr>
                            
                              <td>{{$stagiaire->prenom_stagiaire}}&nbsp;{{$stagiaire->nom_stagiaire}} </td>
                              <td>{{$stagiaire->dateNaissance}} </td>
                              <td>{{$stagiaire->gendre}} </td>
                              <td>{{$stagiaire->CIN}} </td>
                              <td>{{$stagiaire->email}} </td>
                              <td>{{$stagiaire->telephone}} </td>
                              <td>{{$stagiaire->diplome}} </td>
                               <td>@if($stagiaire->actif ==1) activer @elseif($stagiaire->actif ==0) désactiver @endif</td>
                              @if($stagiaire->actif ==1) 
                              <td><div class="d-flex"><form action="{{route('admin.desactifStagiaires',$stagiaire)}}" method="post">  @csrf <input type="submit" value="desactiver" class="btn btn-danger"></form></div></td>
                               @elseif($stagiaire->actif ==0) 
                              <td><div class="d-flex"><form action="{{route('admin.actifStagiaires',$stagiaire)}}" method="post">  @csrf <input type="submit" value="activer" class="btn btn-success"></form></div></td>
                                @endif
                          </tr>
                    @endforeach

                    </tbody>
                </table> 

                
            </div> <!-- body-card -->
            <div class="card-footer">
               
            </div> <!-- footer-card -->
           </div> <!-- /.card-->

    </div> <!-- /.container -->
    <!-- end body -->
   
  </section>

  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>