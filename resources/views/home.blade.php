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
@if(auth()->guard('entreprise')->check())  @include('layouts/sidebarEntreprise')
  @elseif(auth()->guard('stagiaire')->check()) @include('layouts/sidebarStagiaire')
  @elseif(auth()->guard('admin')->check()) @include('layouts/sidebarAdmin')
  @endif
  
    
   @if(auth()->guard('entreprise')->check()) 
  <section class="home-section" style="background-color: #E4E9F7;margin-top:40px;">
      @include('layouts/navbarEntreprise')
    @elseif(auth()->guard('stagiaire')->check())
  <section class="home-section" style="background-color: #E4E9F7;margin-top:40px;">
    @include('layouts/navbarStagiaire')
    @elseif(auth()->guard('admin')->check()) 
  <section class="home-section" style="background-color: #E4E9F7;margin-top:40px;">
    @include('layouts/navbarAdmin')
    @else   
    <section  style="background-color: #E4E9F7;margin-top:40px;">
     @include('layouts/navbar')
   @endif

   <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
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
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2">trouvez le stage parfait et idéal pour vous</h1>
                            <p class="lead text-white-50 mb-4">rechercher la meilleure opportunité de stage dans la meilleure plateforme qui rassemble les stagiaires avec les meilleures sociétés et entreprises au maroc</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">nos services</a>
                               @if(auth()->guard('entreprise')->check() || auth()->guard('stagiaire')->check()) <a class="btn btn-outline-light btn-lg px-4" href="#contact">votre Feedback</a> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                        <h2 class="h4 fw-bolder">Lancer une offre  de stage</h2>
                        <p>notre plateforme donne la possibilité aux entreprises de partager leurs offres de stage là où les stagiaires postuleront à l'offre. et les entreprises pourront sélectionner le meilleur profil répondant aux critères requis</p>
                        
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                        <h2 class="h4 fw-bolder">Lancer une demande de stage</h2>
                        <p>notre plateforme donne la possibilité aux stagiaires de partager leur demande de stage où les entreprises vérifieront les demandes et les profils des stagiaires et sélectionneront le meilleur stagiaire</p>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                        <h2 class="h4 fw-bolder">gérer votre compte et informations</h2>
                        <p>pour attirer plus d'attention et d'opportunités, nous donnons aux stagiaires un espace où ils peuvent ajouter leurs informations et les ajuster selon les besoins</p>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials section-->
        <section class=" bg-light py-3 border-bottom ">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Feedback des utilisateurs</h2>
                    
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6" >
                    <h5 class="text-center">feedback des stagiaires</h5>
                   @foreach($feedstagiaires as $feedstag)
                    <div class="card mb-4 " style="height:160px;">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="ms-4">
                                        <p class="mb-1">{{$feedstag->feedback}}</p>
                                        <div class="small text-muted">- {{$feedstag->stagiaire->prenom_stagiaire}} &nbsp; {{$feedstag->stagiaire->nom_stagiaire}} </div>
                                    </div>
                                </div>
                            </div>
                         
                          </div>
                          @endforeach
                     
                      
                    </div>
                    <div class="col-lg-6">
                      <h5 class="text-center">feedback des entreprises</h5>
                        @foreach($feedentreprises as $feede)
                        <div class="card mb-4 " style="height:160px;">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="ms-4">
                                        <p class="mb-1">{{$feede->feedback}}</p>
                                        <div class="small text-muted">- {{$feede->entreprise->nom_entreprise}}</div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          @endforeach</div>
                      </div>
            </div>
        </section>
        <!-- Contact section-->
        @if(auth()->guard('entreprise')->check())
        <section class=" py-5" id="contact">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">votre Feedback</h2>
                    <p class="lead mb-0">Nous aimerions avoir un Feedback de votre experience dans cette plateforme</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                   
                        <form action="{{route('entreprise.feedback')}}" method="post" >
                        @csrf  
                        <!-- Name input-->
                            <div class="form-floating mb-3 d-none">
                                <input class="form-control" name="id" type="text" value="{{auth::guard('entreprise')->user()->id}}" />
                                <label for="id">id</label>
                                
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" type="email" value="{{auth::guard('entreprise')->user()->email}}" readonly  />
                                <label for="email">Email address</label>
                               
                            </div>
                         
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="feedback" name="feedback" type="text" placeholder="Entrer votre feedback ici..." style="height: 10rem" ></textarea>
                                <label for="feedback">Feedback</label>
                                
                            </div>
                         
                            <div class="d-grid"><button class="btn btn-primary btn-lg " type="submit">envoyer</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>@endif

        @if(auth()->guard('stagiaire')->check())
        <section class=" py-5" id="contact">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">votre Feedback</h2>
                    <p class="lead mb-0">Nous aimerions avoir un Feedback de votre experience dans cette plateforme</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                   
                        <form action="{{route('stagiaire.feedback')}}" method="post" >
                        @csrf  
                        <!-- Name input-->
                            <div class="form-floating mb-3 d-none">
                                <input class="form-control" name="id" type="text" value="{{auth::guard('stagiaire')->user()->id}}" />
                                <label for="id">id</label>
                                
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="email" type="email" value="{{auth::guard('stagiaire')->user()->email}}" readonly  />
                                <label for="email">Email address</label>
                               
                            </div>
                         
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="feedback" name="feedback" type="text" placeholder="Entrer votre feedback ici..." style="height: 10rem" ></textarea>
                                <label for="feedback">Feedback</label>
                                
                            </div>
                         
                            <div class="d-grid"><button class="btn btn-primary btn-lg " type="submit">envoyer</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>@endif
  </section>


  
 


  <script src="{{asset('js/sidebar.js')}}"></script>
  <script src="{{ asset('js/app.js') }}"></script> 
   

</body>
</html>
