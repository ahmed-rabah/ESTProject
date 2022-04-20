<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #222;">
  <div class="container-fluid">
    <!-- logo here -->
</a>
    <a class="navbar-brand" href="{{route('home')}}">Mon Stage.ma</a>
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
               <a class="btn btn-primary" href="{{route('stagiaire.login')}}">stagiaire</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btn btn-success" href="{{route('entreprise.login')}}">entreprise</a>
            
  
    

      <div class="navbar-nav dropdown" style="margin-right: 70px;">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="{{route('entreprise.home')}}" role="button" aria-haspopup="true" aria-expanded="false">s'inscrire</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('stagiaire.register')}}">stagiaire</a>
            <a class="dropdown-item" href="{{route('entreprise.register')}}">entreprise</a>
           
          
    </div>
    </div>
    

  </div>
</nav>