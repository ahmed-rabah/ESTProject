<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>modifier un parcours scolaire</title>
</head>
<body>
   <div class="container">
    <form action="{{ route('stagiaire.school.update',$school) }}" method="post">
    @csrf  

    <div class="form-group">
     <label for="nom">nom d'établissement</label>
          <input type="text" name="nom"  class="form-control" value="{{$school->nomEtablissement}}">
        <span>@error('nom'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="type">type de diplome</label>
          <input type="text" name="type" placeholder="DEUG / LP / MASTER" class="form-control" value="{{$school->typeDiplome}}">
        <span>@error('type'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="dateDebut">date de debut de formation</label>
          <input type="date" name="dateDebut"  class="form-control" value="{{$school->dateDebut}}">
        <span>@error('dateDebut'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="dateFin">date de Fin de formation</label>
          <input type="date" name="dateFin"  class="form-control" value="{{$school->dateFin}}">
        <span>@error('dateFin'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="filiere">filière</label>
          <input type="text" name="filiere" class="form-control" value="{{$school->filiere}}">
        <span>@error('filiere'){{$message}} @enderror</span>
        </div>
        
        <div class="form-group">
     <label for="status">status</label>
          <input type="text" name="status"  placeholder="technicien supérieure / ingénieure .." class="form-control" value="{{$school->status}}">
        <span>@error('status'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
     <label for="description">description</label><br>
        <textarea name="description" id="" cols="90" rows="4">{{$school->description}}</textarea> 
        <span>@error('description'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <input type="submit" value="modifier" class="btn btn-primary">
        </div>
    </form>
    </div>

<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>