<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #222;">
  <div class="container-fluid">
  <a class="bx-menu bg-transparent" style="border :0px; margin-left:0;padding-left:0;"><img src="{{asset('pic/dashboard.png')}}" alt="" width="40px" height="40px" class="m-2" style=" border-radius:20px;">
</a>
    <a class="navbar-brand" href="{{route('stagiaire.home')}}">Espace stagiaire</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01" style="padding-left:300px;">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
          <a class="nav-link @if(Route::is('home')) active @endif" href="{{route('home')}}">accueil
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Route::is('offres')) active @endif" href="{{route('offres')}}">offres de stages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(Route::is('demandes')) active @endif" href="{{route('demandes')}}">demandes de stages</a>
        </li>
       
      </ul>
      
      <div class="navbar-nav dropdown" style="margin-right: 70px;">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{route('stagiaire.home')}}" role="button" aria-haspopup="true" aria-expanded="false">mon espace</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('stagiaire.settings')}}">paramètres</a>
            <a class="dropdown-item bg-danger" href="{{route('stagiaire.logout')}}"> <form method="post" action="{{ route('stagiaire.logout') }}">
                                                        @csrf
                            <button type="submit" class="bg-danger" style="border:0px;">déconnexion</button>
                        </form></a>
          
    </div>
    </div>
    
  </div>
</nav>