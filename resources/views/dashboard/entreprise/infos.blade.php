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
    
    @include('layouts/sidebarEntreprise')
    
    <section class="home-section" style="margin-top:70px;">
   
    @include('layouts/navbarEntreprise')
  
<div class="container pb-5" style="border : 3px solid whitesmoke;">
    <h4 style="padding: 20px 8px 10px 8px; background-color:whitesmoke;" class="container text-center w-50">les informations de <strong>{{auth::guard('entreprise')->user()->nom_entreprise}} </strong></h4>
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
    <div class="d-flex justify-content-around"  style="border : 3px solid whitesmoke; border-radius : 20px">
        <div class="pt-3" style="width:30%;">
                <div class="d-flex align-items-center justify-content-center">
                <h4 class="">LOGO</h4>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                  @if($entreprise->logo != "")
                <img src="{{ asset('/storage/'.$entreprise->logo)}}" alt="" height="87%" width="87%" style="border: 1px solid black ; ">
               @else
                <img src="{{ asset('pic/logo.png')}}" height="87%" width="87%" style="border: 1px solid black ; ">
              @endif 
              </div>
        
        </div>
        <div class="pt-5" style="width:70%;">
            
        <div class="d-flex pt-3 pb-3 justify-content-around">
            <div class="text-center"><h6><strong >Nom de l'entreprise: </strong><span class="form-control" style="display: inline;">{{auth::guard('entreprise')->user()->nom_entreprise}}  </span></h6></div>
            <div  class="text-center"><h6><strong >Identifiant Commun Entreprise : </strong><span class="form-control" style="display: inline;">{{auth::guard('entreprise')->user()->ICE}}</span></h6></div>
            <div  class="text-center"><h6><strong >ville :  </strong><span class="form-control" style="display: inline;">{{auth::guard('entreprise')->user()->ville}}</span></h6></div>

        </div>
    

        <div class="d-flex pt-3 pb-3">
            <div style="width:50%;" class="text-center"><h6><strong>adresse Email : </strong><span class="form-control" style="display: inline;">{{auth::guard('entreprise')->user()->email}}</span></h6></div>
            <div style="width:50%;" class="text-center"><h6><strong>adresse: </strong><span class="form-control" style="display: inline;">{{auth::guard('entreprise')->user()->adresse}}</span></h6></div>
           
        </div>
        <div class="d-flex pt-3 pb-3">
            <div style="width:50%;" class="text-center"><h6><strong>telephone : </strong><span class="form-control" style="display: inline;">{{auth::guard('entreprise')->user()->telephone}}</span></h6></div>
            <div style="width:50%;" class="text-center"><h6><strong>publication activer/desactiver: </strong><span class="form-control" style="display: inline;">@if(auth::guard('entreprise')->user()->actif==1) Activer @elseif(auth::guard('entreprise')->user()->actif==0) Désactiver @endif</span></h6></div>
            </div>
            <div class="d-flex pt-3 pb-3">
            <div style="width:50%;" class="text-center"><h6><strong>category : </strong><span class="form-control" style="display: inline;">{{auth::guard('entreprise')->user()->category->name}}</span></h6></div>
            <div style="width:50%;" class="text-center"><h6><strong>domaine : </strong><span class="form-control" style="display: inline;">{{auth::guard('entreprise')->user()->domaine->name}}</span></h6></div>
            </div>
            <div class="d-flex justify-content-center pt-3 pb-3">
            <div style="width:100%;" class="text-center"><h6><strong>description : </strong></h6><div class="card"><h6 class="" style="display: inline;">{{auth::guard('entreprise')->user()->description}}</h6></div></div>
            </div>
            <div class="d-flex justify-content-end pt-3 pb-3">
            <button type="button" class="btn btn-success m-2" style="width:150px" data-bs-toggle="modal" data-bs-target="#myModal2">
                modifier
            </button>
            </div>
          
      </div>
</div>
<div class="row mt-4">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-center">
                    permession pour lancement des offres de stages</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">@if($entreprise->actif ==0) désactiver @elseif($entreprise->actif ==1) Activer @endif</div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                    nombre de mes offres</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{$countoffre}}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div><div class="d-fex align-items-end justify-content-end"><a href="{{route('entreprise.offre.dashboard')}}" class="btn btn-primary" style=" border-radius: 17px 0;">mes offres</a></div>
        </div>
    </div><div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-center">
                    nombre des entretiens</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">{{$countentretien}}</div>
                </div>
               
            </div>
        </div>
        </div>
     </div>


<!-- Earnings (Monthly) Card Example -->


<!-- Content Row -->
</div>
</div>
  </section>


  
 <!-- The Modal -->
<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modifier les informations de l'entreprise</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('entreprise.update',$entreprise)}}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="row">
            <div class="col">
        <div class="form-group">
        <label for="name">nom d'entreprise</label>
          <input type="text" name="name"  class="form-control" value="{{auth::guard('entreprise')->user()->nom_entreprise}}">
          <span class="text-danger">@error('name'){{$message}} @enderror</span class="text-danger" class="text-danger">
         </div>
         </div>
         <div class="col">
         <div class="form-group">
        <label for="ICE">ICE</label>
          <input type="text" name="ICE"  class="form-control" value="{{auth::guard('entreprise')->user()->ICE}}">
          <span class="text-danger">@error('ICE'){{$message}} @enderror</span class="text-danger">
         </div>
         </div>
         
         </div>
      
         
        <div class="row">
            <div class="col">
         <div  class="form-group">
          <label for="email">email</label>
          <input type="text" name="email"  class="form-control" value="{{auth::guard('entreprise')->user()->email}}" placeholder="email@gmail.com">
          <span class="text-danger">@error('email'){{$message}} @enderror</span class="text-danger" >
         </div>
         </div>
         <div class="col"> 
         <div  class="form-group">
          <label for="adresse">adresse</label>
          <input type="text" name="adresse"  class="form-control" value="{{auth::guard('entreprise')->user()->adresse}}" placeholder="ex : nr 2 avenue aljazzira hay sallam sale ">
          <span class="text-danger">@error('adresse'){{$message}} @enderror</span class="text-danger">
         </div>
         </div>
         
        </div>
         <div class="row">
         <div class="col">
         <div class="form-group">
        <label for="ville">ville</label>
          <input type="text" name="ville"  class="form-control" value="{{auth::guard('entreprise')->user()->ville}}">
          <span class="text-danger">@error('ville'){{$message}} @enderror</span class="text-danger">
         </div>
         </div>
         <div class="col"> 
         <div  class="form-group">
          <label for="phone">phone</label>
          <input type="text" name="phone"  class="form-control" value="{{auth::guard('entreprise')->user()->telephone}}" placeholder="ex : 06 11 11 11 11">
          <span class="text-danger">@error('phone'){{$message}} @enderror</span class="text-danger">
         </div>
         </div>
          </div>
         
         
              <div class="form-group mb-3 ">
            <label for="logo" class="form-label">logo du entreprise</label>
            <input class="form-control w-75" type="file" id="logo" name="logo" value="{{ $entreprise->logo}}">
            <span class="text-danger">@error('logo'){{$message}} @enderror</span class="text-danger">
           </div>
           <div class="form-group" >
                            <label for="domaine" class="d-flex align-items-start justify-content-start">domaines</label>
                            <select class="form-select" aria-label="Default select example" id="domaine" name="domaine">
                              @foreach($domaines as $domaine)
                            
                              <option value="{{$domaine->id}}" @if($domaine->id == auth()->guard('entreprise')->user()->domaine->id) selected @endif>{{$domaine->name}}</option>
                              @endforeach
                              </select>
                            <span class="text-danger">@error('domaine'){{$message}} @enderror</span>
                          </div>
          <div class="form-group" >
                            <label for="category" class="d-flex align-items-start justify-content-start">categories</label>
                            <select class="form-select" aria-label="Default select example" id="category" name="category">
                              @foreach($categories as $category)
                            
                              <option value="{{$category->id}}" @if($category->id == auth()->guard('entreprise')->user()->category->id) selected @endif>{{$category->name}}</option>
                              @endforeach
                              </select>
                            <span class="text-danger">@error('category'){{$message}} @enderror</span>
                          </div>            
            <div class="form-group">
     <label for="description">description</label><br>
        <textarea name="description" id="" cols="50" rows="4">{{auth::guard('entreprise')->user()->description}}</textarea> 
        <span>@error('description'){{$message}} @enderror</span>
        </div>
              
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="modifier">
        </form>  
    </div>

    </div>
  </div>
</div>



  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>
