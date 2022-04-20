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
  <div class="container pb-5" style="border : 3px solid whitesmoke;">
    <h4 style="padding: 20px 8px 10px 8px; background-color:whitesmoke;" class="container text-center w-50">les informations personnels de <strong>{{auth::guard('stagiaire')->user()->prenom_stagiaire}}  {{auth::guard('stagiaire')->user()->nom_stagiaire}}</strong></h4>
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
                <h4 class="">CV</h4>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                  @if($stagiaire->CV != "")
                <img src="{{ asset('/storage/'.$stagiaire->CV)}}" alt="" height="100%" width="100%" style="border: 1px solid black ; ">
               @else
                <img src="{{ asset('pic/CV.png')}}" height="100%" width="100%" style="border: 1px solid black ; ">
              @endif 
              </div>
        
        </div>
        <div class="" style="width:70%;">
        <div class="d-flex align-items-center justify-content-center">
        @if($stagiaire->photo != "")
        <img src="{{ asset('/storage/'.$stagiaire->photo)}}" alt="" width="100px" height="100px" style="border:2px solid black; border-radius:50%;">
         @else
                <img src="{{ asset('pic/profile.png')}}" width="100px" height="100px" style="border:2px solid black; border-radius:50%;">
              @endif 
        
      </div>
      
        <div class="d-flex pt-3 pb-3 justify-content-around">
            <div class="text-center"><h6><strong >Nom Complet: </strong><span class="form-control" style="display: inline;">{{auth::guard('stagiaire')->user()->prenom_stagiaire}}  {{auth::guard('stagiaire')->user()->nom_stagiaire}}</span></h6></div>
            <div  class="text-center"><h6><strong >Date de Naissance:  </strong><span class="form-control" style="display: inline;">{{auth::guard('stagiaire')->user()->dateNaissance}}</span></h6></div>
            <div  class="text-center"><h6><strong >CIN:  </strong><span class="form-control" style="display: inline;">{{auth::guard('stagiaire')->user()->CIN}}</span></h6></div>

        </div>
    

        <div class="d-flex pt-3 pb-3">
            <div style="width:50%;" class="text-center"><h6><strong>adresse Email : </strong><span class="form-control" style="display: inline;">{{auth::guard('stagiaire')->user()->email}}</span></h6></div>
            <div style="width:50%;" class="text-center"><h6><strong>telephone: </strong><span class="form-control" style="display: inline;">{{auth::guard('stagiaire')->user()->telephone}}</span></h6></div>
            </div>
            <div class="d-flex pt-3 pb-3">
            <div style="width:50%;" class="text-center"><h6><strong>gendre : </strong><span class="form-control" style="display: inline;">{{auth::guard('stagiaire')->user()->gendre}}</span></h6></div>
            <div style="width:50%;" class="text-center"><h6><strong>diplome: </strong><span class="form-control" style="display: inline;">{{auth::guard('stagiaire')->user()->diplome}}</span></h6></div>
            </div>
            <div class="d-flex justify-content-center pt-3 pb-3">
            <div style="width:50%;" class="text-center"><h6><strong>description : </strong></h6>
            <div class="form-control"><h6 class="" style="display: inline;">{{auth::guard('stagiaire')->user()->description}}</h6></div></div>
            </div>
            <div class="d-flex justify-content-end pt-3 pb-3">
            <button type="button" class="btn btn-success m-2" style="width:150px" data-bs-toggle="modal" data-bs-target="#myModal">
                modifier
            </button>
            </div>
          
      </div>
</div>
    <hr>
    <div class="container ">
    <h4 style="padding: 20px 8px 10px 8px; background-color:whitesmoke;" class="container text-center w-50">Formation et Experiences de  <strong>{{auth::guard('stagiaire')->user()->prenom_stagiaire}}  {{auth::guard('stagiaire')->user()->nom_stagiaire}}</strong></h4>
      
    <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <h3> Parcours académique :</h3>  
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body" style="background-color:#E4E9F7;">
        <a href="{{ route('stagiaire.school.create') }}" class="btn btn-primary">ajouter une nouvelle formation</a>
        @foreach($parcours as $parcour)
          <div class="card">
            <div class="card-header bg-secondary text-white">
               <h6 class="text-start" style="padding-right:20px">| de &nbsp;&nbsp;{{$parcour->dateDebut}} &nbsp;&nbsp; à &nbsp;&nbsp; {{$parcour->dateFin}}</h6>
            </div>
            <div class="card-body d-flex justify-content-center" style="background-color:#E4E9F7">
            
            <table class="table table-hover w-50" >  
             <tbody >
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
            <div class="card-footer bg-secondary">
           <a href="{{ route('stagiaire.school.edit',$parcour) }}" class="btn btn-primary">modifier</a>
          </div>
        
          </div><br>
          @endforeach
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <h3>experiences professionnelles :</h3>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <a href="{{ route('stagiaire.experience.create') }}" class="btn btn-primary">ajouter une nouvelle experience</a>
      @foreach($experiences as $experience)
      <div class="card">
                <div class="card-header bg-secondary text-white"> 
                  <h6 class="text-start" style="padding-right:20px">| de &nbsp;&nbsp;{{$parcour->dateDebut}} &nbsp;&nbsp; à &nbsp;&nbsp; {{$parcour->dateFin}}</h6>
                </div>
                <div class="card-body d-flex justify-content-center" style="background-color:#E4E9F7">
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

                </div>  <!-- /.card-body -->
                <div class="card-footer bg-secondary">
         <a href="{{ route('stagiaire.experience.edit',$experience) }}" class="btn btn-primary">modifier</a>
       </div>
        </div>  <!-- /.card -->
        <br>
        @endforeach
    </div>
    </div>
  </div>
 
</div>   
  

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modifier les informations personnels</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('stagiaire.updatePersonal',$stagiaire)}}" method="post" enctype="multipart/form-data">
       @csrf
        <div class="row">
            <div class="col">
        <div class="form-group">
        <label for="name">nom</label>
          <input type="text" name="name"  class="form-control" value="{{auth::guard('stagiaire')->user()->nom_stagiaire}}">
          <span class="text-danger">@error('name'){{$message}} @enderror</span class="text-danger" class="text-danger">
         </div>
         </div>
         <div class="col">
         <div class="form-group">
        <label for="prenom">prenom</label>
          <input type="text" name="prenom"  class="form-control" value="{{auth::guard('stagiaire')->user()->prenom_stagiaire}}">
          <span class="text-danger">@error('prenom'){{$message}} @enderror</span class="text-danger">
         </div>
         </div>
         </div>
         <div class="row">
              <div class="col">
              <div class="form-group"> 
                    <label for="dateN">date de naissance</label>
                      <input type="date" name="dateN"  class="form-control" value="{{auth::guard('stagiaire')->user()->dateNaissance}}">
                      <span class="text-danger">@error('dateN'){{$message}} @enderror</span class="text-danger">
                    </div>
              </div>
              <div class="col">
              <div class="form-group">
                    <label for="CIN">CIN</label>
                      <input type="text" name="CIN"  class="form-control" value="{{auth::guard('stagiaire')->user()->CIN}}" placeholder="AZ2211">
                      <span class="text-danger">@error('CIN'){{$message}} @enderror</span class="text-danger" >
                    </div>
              </div>
         </div>
         
        <div class="row">
            <div class="col">
         <div  class="form-group">
          <label for="email">email</label>
          <input type="text" name="email"  class="form-control" value="{{auth::guard('stagiaire')->user()->email}}" placeholder="email@gmail.com">
          <span class="text-danger">@error('email'){{$message}} @enderror</span class="text-danger" >
         </div>
         </div>
         <div class="col"> 
         <div  class="form-group">
          <label for="phone">phone</label>
          <input type="text" name="phone"  class="form-control" value="{{auth::guard('stagiaire')->user()->telephone}}" placeholder="ex : 06 11 11 11 11">
          <span class="text-danger">@error('phone'){{$message}} @enderror</span class="text-danger">
         </div>
         </div>
         </div>
         <div class="form-group">
             <span>gendre : </span>
             <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gendre" id="masculin" value="masculin" checked>
                  <label class="form-check-label" for="masculin">masculin</label>
            </div>
            <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gendre" id="feminin" value="feminin">
                  <label class="form-check-label" for="feminin">feminin</label>
            </div>          
        </div>
              <div class="form-group mb-3 ">
            <label for="photo" class="form-label">photo du stagiaire</label>
            <input class="form-control w-75" type="file" id="photo" name="photo" value="{{ $stagiaire->photo}}">
            <span class="text-danger">@error('photo'){{$message}} @enderror</span class="text-danger">
            
        </div>

            <div  class="form-group">
                <label for="diplome">diplome : </label>
                <input type="text" name="diplome"  class="form-control" value="{{auth::guard('stagiaire')->user()->diplome}}" placeholder="DEUG / DUT/ LICENSE....">
                <span class="text-danger">@error('diplome'){{$message}} @enderror</span class="text-danger">
            </div>
            <div class="form-group mb-3">
            <label for="CV" class="form-label">CV du stagiaire</label>
            <input  type="file" id="CV" name="CV" class="form-control w-75" value="{{ asset('/storage/'.$stagiaire->photo)}}">
            <span class="text-danger">@error('CV'){{$message}} @enderror</span class="text-danger">
             
        </div>
            <div class="form-group">
     <label for="description">description</label><br>
        <textarea name="description" id="" cols="50" rows="4">{{auth::guard('stagiaire')->user()->description}}</textarea> 
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

    

  </section>


  
 


  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>
