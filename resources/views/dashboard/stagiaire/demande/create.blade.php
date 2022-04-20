<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>creation de demande</title>
</head>
<body>
  
<div class=" text-center d-flex align-items-center justify-content-center" style="height: 550px;width:400px; margin:auto;">
           
           

        <div class="container">
            
                    
      <form action=" {{route('stagiaire.demande.store')}}" method="post" style="border:1px solid black;border-radius:30px;background-color:whitesmoke;padding: 35px 25px;">
          <h4>création d'une demande de stage</h4>
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
    @csrf


        <div class="form-group">
          <label for="ville">ville</label>
          <input type="text" name="ville"  class="form-control" value="{{old('ville')}}">
          <span class="text-danger">@error('ville'){{$message}} @enderror</span>
         </div>
         <div class="form-group">
             <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="renumeration" id="renumere" value="1">
                  <label class="form-check-label" for="renumere">rénuméré</label>
            </div>
            <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="renumeration" id="nonrenumere" value="0" checked>
                  <label class="form-check-label" for="nonrenumere">non rénuméré</label>
            </div>
            <span class="text-danger">@error('renumeration'){{$message}} @enderror</span>         
        </div>
         <label for="dateDebut">date de debut de stage</label>
          <input type="date" name="dateDebut"  class="form-control" value="{{old('dateDebut')}}">
        <span class="text-danger">@error('dateDebut'){{$message}} @enderror</span>
        
        <div class="form-group">
         <label for="dateFin">date de Fin de stage</label>
          <input type="date" name="dateFin"  class="form-control" value="{{old('dateFin')}}">
        <span class="text-danger">@error('dateFin'){{$message}} @enderror</span>
        </div>
                          <div class="form-group" >
                            <label for="domaine" class="d-flex align-items-start justify-content-start">domaine</label>
                            <select class="form-select" aria-label="Default select example" id="domaine" name="domaine">
                              @foreach($domaines as $domaine)
                            
                              <option value="{{$domaine->id}}">{{$domaine->name}}</option>
                              @endforeach
                              </select>
                            <span class="text-danger">@error('domaine'){{$message}} @enderror</span>
                          
                </div>
                <div class="form-group" >
                            <label for="type" class="d-flex align-items-start justify-content-start">types</label>
                            <select class="form-select" aria-label="Default select example" id="type" name="type">
                              @foreach($types as $type)
                            
                              <option value="{{$type->id}}">{{$type->name}}</option>
                              @endforeach
                              </select>
                            <span class="text-danger">@error('type'){{$message}} @enderror</span>
                          </div>
                          <div class="form-group">
                        <label for="description">description</label><br>
                            <textarea name="description" id="" cols="30" rows="4" placeholder="description" value="{{old('description')}}"></textarea> 
                            <span>@error('description'){{$message}} @enderror</span>
                            </div>
                                  
                  <div class="form-group pt-3">
                        <input type="submit" value="créer" class="btn btn-primary">
                       </div>
        
                    </form>
               
                
  </div>
      </div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>