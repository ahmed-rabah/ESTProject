<div class="sidebar close" style="margin-top:70px;">
  
    <div class="logo-details" style="padding-left:10px;">
    @if(auth::guard('entreprise')->user()->logo != "")
        <img src="{{asset('/storage/'.auth::guard('entreprise')->user()->logo)}}"  width="50px" height="50px" class="m-2" style="background-color:white; border-radius:20px;">
                @else
                <img src="{{ asset('pic/logo.png') }}"  width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
              @endif 
      <span class="logo_name">{{auth::guard('entreprise')->user()->nom_entreprise}}</span>
    </div>
    <ul class="nav-links">
      
    
      <li>
        <a href="{{route('entreprise.infos')}}"  style="padding-left:10px;">
        <img src="{{asset('pic/profile.png')}}"  width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">profil de <strong>{{auth::guard('entreprise')->user()->nom_entreprise}}</strong></span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('entreprise.infos')}}">profil de <strong>{{auth::guard('entreprise')->user()->nom_entreprise}}</strong></a></li>
        </ul>
      </li>

      <li>
        <a href="{{route('entreprise.offre.dashboard')}}" style="padding-left:10px;padding-bottom:10px;">
        <img src="{{asset('pic/offre.png')}}" width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">offres</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('entreprise.offre.dashboard')}}">offres</a></li>
        </ul>
      </li>

      <li>
        <a href="{{route('entreprise.entretiens')}}" style="padding-left:10px;padding-bottom:10px;">
        <img src="{{asset('pic/entretien.png')}}" width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">entretiens</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('entreprise.entretiens')}}">entretiens</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('entreprise.settings')}}" style="padding-left:10px;padding-bottom:10px;">
          <img src="{{asset('pic/settings.png')}}" width="30px" height="30px" class="m-2" style="background-color:white; border-radius:20px;">
          <span class="link_name">paramètres</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('entreprise.settings')}}">paramètres</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
      @if(auth::guard('entreprise')->user()->logo != "")
       <img src="{{asset('/storage/'.auth::guard('entreprise')->user()->logo)}}" alt="profileImg"> 
               @else
                <img src="{{ asset('pic/logo.png') }}">
              @endif 
      </div>
      <div class="name-job">
        <div class="profile_name">{{auth::guard('entreprise')->user()->nom_entreprise}}</div>
        <div class="job">{{auth::guard('entreprise')->user()->domaine->name}}</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>