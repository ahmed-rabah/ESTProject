<div class="sidebar close" style="margin-top:70px;">
  
    <div class="logo-details">
     @if(auth::guard('stagiaire')->user()->photo != "")
        <img src="{{asset('/storage/'.auth::guard('stagiaire')->user()->photo)}}"  width="50px" height="50px" class="m-2" style="background-color:white; border-radius:20px;">
                @else
                <img src="{{ asset('pic/profile.png') }}"  width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
              @endif  <span class="logo_name">{{auth::guard('stagiaire')->user()->prenom_stagiaire}} {{auth::guard('stagiaire')->user()->nom_stagiaire}}</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{route('stagiaire.home')}}" style="padding-left:10px;">
        <img src="{{asset('pic/dashboard.png')}}" alt="" width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('stagiaire.home')}}">Dashboard</a></li>
        </ul>
      </li>
   
    
      <li style="padding : 0; margin:0;">
        <a href="{{route('stagiaire.infos')}}"  style="padding-left:10px;">
        <img src="{{asset('pic/profile.png')}}"  width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">mon profil</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('stagiaire.infos')}}">profil de <strong>{{auth::guard('stagiaire')->user()->nom_stagiaire}}</strong> <strong>{{auth::guard('stagiaire')->user()->prenom_stagiaire}}</strong></a></li>
        </ul>
      </li>

      <li>
        <a href="{{route('stagiaire.demande.dashboard')}}" style="padding-left:10px;">
        <img src="{{asset('pic/demande.png')}}" width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">demandes</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('stagiaire.demande.dashboard')}}">mes demandes</a></li>
        </ul>
      </li>

      <li>
        <a href="{{route('stagiaire.candidatures')}}" style="padding-left:10px;">
        <img src="{{asset('pic/candidature.png')}}" width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">candidatures</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('stagiaire.candidatures')}}">mes candidatures</a></li>
        </ul>
      </li>

      <li>
        <a href="{{route('stagiaire.entretiens')}}" style="padding-left:10px;">
        <img src="{{asset('pic/entretien.png')}}" width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">entretiens</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('stagiaire.entretiens')}}">mes entretiens</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('stagiaire.settings')}}" style="padding-left:10px;">
          <img src="{{asset('pic/settings.png')}}" width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">paramètres</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('stagiaire.settings')}}">paramètres</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
       @if(auth::guard('stagiaire')->user()->photo != "")
        <img src="{{asset('/storage/'.auth::guard('stagiaire')->user()->photo)}}">
                @else
                <img src="{{ asset('pic/profile.png')}}"  >
              @endif  
              <span class="logo_name"></span>
    
      </div>
      <div class="name-job">
        <div class="profile_name">{{auth::guard('stagiaire')->user()->nom_stagiaire}}</div>
        <div class="job">{{auth::guard('stagiaire')->user()->prenom_stagiaire}}</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>