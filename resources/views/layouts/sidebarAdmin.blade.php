<div class="sidebar close" style="margin-top:70px;">
  
    
 
    <ul class="nav-links">
  
      <li>
        <a href="{{route('admin.home')}}" style="padding-left:10px; padding-bottom:22px; padding-bottom:22px;">
        <img src="{{asset('pic/dashboard.png')}}" alt="" width="30px" height="30px" class="m-1" style="background-color:white; border-radius:20px;">
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('admin.home')}}">Dashboard</a></li>
        </ul>
      </li>
       <!-- <li>
        <a href="{{route('admin.infos')}}"  style="padding-left:10px; padding-bottom:22px; padding-bottom:22px;">
        <img src="{{asset('pic/admin.jfif')}}"  width="30px" height="30px" class="m-1" style="background-color:white; border-radius:20px;">
          <span class="link_name">profil de <strong>{{auth::guard('admin')->user()->name}}</strong></span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name text-white" href="{{route('admin.infos')}}">profil de <strong>{{auth::guard('admin')->user()->name}}</strong></a></li>
        </ul>
      </li> -->

      <li>
        <a href="{{route('admin.stagiaires')}}" style="padding-left:10px; padding-bottom:22px; padding-bottom:22px;padding-bottom:10px;">
        <img src="{{asset('pic/stagiaire.png')}}" width="30px" height="30px" class="m-1" style="background-color:white; border-radius:20px;">
          <span class="link_name">stagiaires</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('admin.stagiaires')}}">stagiaires</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('admin.entreprises')}}" style="padding-left:10px; padding-bottom:22px; padding-bottom:22px;padding-bottom:10px;">
        <img src="{{asset('pic/entreprise.png')}}" width="30px" height="30px" class="m-1" style="background-color:white; border-radius:20px;">
          <span class="link_name">entreprises</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('admin.entreprises')}}">entreprises</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('admin.offres')}}" style="padding-left:10px; padding-bottom:22px; padding-bottom:22px;padding-bottom:10px;">
        <img src="{{asset('pic/offre.png')}}" width="30px" height="30px" class="m-1" style="background-color:white; border-radius:20px;">
          <span class="link_name">offres</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('admin.offres')}}">offres</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('admin.demandes')}}" style="padding-left:10px; padding-bottom:22px; padding-bottom:22px;padding-bottom:10px;">
        <img src="{{asset('pic/demande.png')}}" width="30px" height="30px" class="m-1" style="background-color:white; border-radius:20px;">
          <span class="link_name">demandes</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('admin.demandes')}}">demandes</a></li>
        </ul>
      </li>

      <li>
        <a href="{{route('admin.entretiens')}}" style="padding-left:10px; padding-bottom:22px; padding-bottom:22px;padding-bottom:10px;">
        <img src="{{asset('pic/entretien.png')}}" width="30px" height="30px" class="m-1" style="background-color:white; border-radius:20px;">
          <span class="link_name">entretiens</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('admin.entretiens')}}">entretiens</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('admin.settings')}}" style="padding-left:10px; padding-bottom:22px; padding-bottom:22px;padding-bottom:10px;">
          <img src="{{asset('pic/settings.png')}}" width="30px" height="30px" class="m-1" style="background-color:white; border-radius:20px;">
          <span class="link_name">paramètres</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('admin.settings')}}">paramètres</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="{{asset('pic/admin.jfif')}}">
      </div>
      <div class="name-job">
        <div class="profile_name">{{auth::guard('admin')->user()->name}}</div>

      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>