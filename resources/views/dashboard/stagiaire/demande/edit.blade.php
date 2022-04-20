<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>modifier une demande </title>
</head>
<body style="background-color:#a3fff9">
  
<div class=" text-center d-flex align-items-center justify-content-center" style="height: 600px;width:500px; margin:auto;">
           
           

        <div class="container" >
            
                    
      <form action=" {{route('stagiaire.demande.update',$demande)}}" method="post" style="border:1px solid black;border-radius:30px;background-color:whitesmoke;padding: 35px 25px;">
          <h4>modification de la demande de stage</h4>
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

        <div class="d-flex">
        <div class="form-group "  >
          <label for="ville">ville</label>
          <input type="text" name="ville"  class="form-control" value="{{$demande->ville}}">
          <span class="text-danger">@error('ville'){{$message}} @enderror</span>
         </div>
         <div class="form-group w-100">
         <label>renumeration : &nbsp;</label><br>
             <div class="form-check form-check-inline pt-2">
             
               <input class="form-check-input" type="radio" name="renumeration" id="renumere" value="1" @if($demande->renumeration == 1) checked @endif>
                  <label class="form-check-label" for="renumere">rénuméré</label>
            </div>
            <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="renumeration" id="nonrenumere" value="0" @if($demande->renumeration == 0) checked @endif>
                  <label class="form-check-label" for="nonrenumere">non rénuméré</label>
            </div>
         </div>             
        </div>
         <label for="dateDebut">date de debut de stage</label>
          <input type="date" name="dateDebut"  class="form-control" value="{{$demande->dateDebut}}">
        <span>@error('dateDebut'){{$message}} @enderror</span>
        
        <div class="form-group">
     <label for="dateFin">date de Fin de stage</label>
          <input type="date" name="dateFin"  class="form-control" value="{{$demande->dateFin}}">
        <span>@error('dateFin'){{$message}} @enderror</span>
        </div>

        <div class="form-group" >
                            <label for="domaine" class="d-flex align-items-start justify-content-start">domaine</label>
                            <select class="form-select" aria-label="Default select example" id="domaine" name="domaine">
                              @foreach($domaines as $domaine)
                            
                              <option value="{{$domaine->id}}" @if($domaine->id == $demande->domaine->id) selected @endif>{{$domaine->name}}</option>
                              @endforeach
                              </select>
                            <span class="text-danger">@error('domaine'){{$message}} @enderror</span>
                          
                </div>
                <div class="form-group" >
                            <label for="type" class="d-flex align-items-start justify-content-start">types</label>
                            <select class="form-select" aria-label="Default select example" id="type" name="type">
                              @foreach($types as $type)
                            
                              <option value="{{$type->id}}" @if($type->id == $demande->type->id) selected @endif>{{$type->name}}</option>
                              @endforeach
                              </select>
                            <span class="text-danger">@error('type'){{$message}} @enderror</span>
                          </div>
                          <div class="form-group">
                          <label for="description">description</label><br>
                            <textarea name="description" id="" cols="50" rows="4" placeholder="description">{{$demande->description}}</textarea> 
                            <span>@error('description'){{$message}} @enderror</span>
                            </div>
        <div class="form-group pt-3">
          <input type="submit" value="modifier" class="btn btn-primary">
        </div>

       
                    </form>
               
                
        </div>

        </div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>