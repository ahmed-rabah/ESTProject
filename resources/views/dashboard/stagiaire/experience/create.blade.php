<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>créer une experience</title>
</head>
<body style="background-color:rgb(243,222,210);">
<div class="d-flex justify-content-center align-items-center m-3 p-2">
   <div class="container w-50 p-3"  style="background-color:rgb(122,192,222);border-radius:27px;">
    <form action="{{ route('stagiaire.experience.store') }}" method="post">
    @csrf  
   <h4>ajouter une éxperience</h4>
    <div class="form-group">
     <label for="nom">nom d'établissement de l'experience</label>
          <input type="text" name="nom"  class="form-control" value="{{old('nom')}}">
        <span>@error('nom'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="type">type d'experience</label>
          <input type="text" name="type" placeholder="stage de fin d'études / emploie ..." class="form-control" value="{{old('type')}}">
        <span>@error('type'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="dateDebut">date de debut de formation</label>
          <input type="date" name="dateDebut"  class="form-control" value="{{old('dateDebut')}}">
        <span>@error('dateDebut'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="dateFin">date de Fin de formation</label>
          <input type="date" name="dateFin"  class="form-control" value="{{old('dateFin')}}">
        <span>@error('dateFin'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="post">post</label>
          <input type="text" name="post" placeholder="developpeur / concepteur ..."  class="form-control" value="{{old('post')}}">
        <span>@error('post'){{$message}} @enderror</span>
        </div>
        
       
        <div class="form-group">
     <label for="description">description</label><br>
        <textarea name="description" id="" cols="35" rows="4">{{old('description')}}</textarea> 
        <span>@error('description'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <input type="submit" value="créer" class="btn btn-primary">
        </div>
    </form>
    </div>
   </div>
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>