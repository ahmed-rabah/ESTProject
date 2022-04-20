<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>modifier une experience</title>
</head>
<body>
   <div class="container">
    <form action="{{ route('stagiaire.experience.update',$experience) }}" method="post">
    @csrf  

    <div class="form-group">
     <label for="nom">nom d'établissement de l'experience</label>
          <input type="text" name="nom"  class="form-control" value="{{$experience->nomExperience}}">
        <span>@error('nom'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="type">type d'experience</label>
          <input type="text" name="type" placeholder="stage de fin d'études / emploie ..." class="form-control" value="{{$experience->type}}">
        <span>@error('type'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="dateDebut">date de debut de formation</label>
          <input type="date" name="dateDebut"  class="form-control" value="{{$experience->dateDebut}}">
        <span>@error('dateDebut'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="dateFin">date de Fin de formation</label>
          <input type="date" name="dateFin"  class="form-control" value="{{$experience->dateFin}}">
        <span>@error('dateFin'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="post">post</label>
          <input type="text" name="post" placeholder="developpeur / concepteur ..."  class="form-control" value="{{$experience->post}}">
        <span>@error('post'){{$message}} @enderror</span>
        </div>
        
       
        <div class="form-group">
     <label for="description">description</label><br>
        <textarea name="description" id="" cols="90" rows="4">{{$experience->description}}</textarea> 
        <span>@error('description'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <input type="submit" value="créer" class="btn btn-primary">
        </div>
    </form>
    </div>

<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>