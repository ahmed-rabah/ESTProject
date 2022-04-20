<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>entreprise register</title>
</head>
<body style="background-color:#000fff;">
<div class=" text-center d-flex align-items-center justify-content-center" style="width:470px; margin:auto; margin-top: 20px; margin-bottom: 20px;">

        <div class="container">
       
                    
                <form action="{{ route('entreprise.create') }}" method="post" style="border:1px solid black;border-radius:30px;padding: 0px 20px;background-color:whitesmoke;" > 
                <h4>entreprise register</h4>
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
            <div class="form-group" style="width:70%; margin:auto;">
            <label for="ICE" class="d-flex align-items-start justify-content-start">Identifiant Commun Entreprise</label>
              <input type="text" name="ICE"  class="form-control" value="{{old('ICE')}}">
              <span class="text-danger">@error('ICE'){{$message}} @enderror</span>
            </div>
            <div class="row">
                <div class="col">
                <div class="form-group">
            <label for="nom" class="d-flex align-items-start justify-content-start">nom de l'entreprise</label>
              <input type="text" name="nom"  class="form-control" value="{{old('nom')}}">
              <span class="text-danger">@error('nom'){{$message}} @enderror</span>
            </div>
                </div>
                <div class="col">
                <div class="form-group">
            <label for="ville" class="d-flex align-items-start justify-content-start">ville</label>
              <input type="text" name="ville"  class="form-control" value="{{old('ville')}}">
              <span class="text-danger">@error('ville'){{$message}} @enderror</span>
            </div>
                </div>
              </div>  
            
            
            <div  class="form-group" style="width:70%; margin:auto;">
              <label for="email" class="d-flex align-items-start justify-content-start">email</label>
              <input type="text" name="email"  class="form-control" value="{{old('email')}}">
              <span class="text-danger">@error('email'){{$message}} @enderror</span>
            </div> 
            <div  class="form-group" style="width:70%; margin:auto;">
              <label for="adresse" class="d-flex align-items-start justify-content-start">adresse</label>
              <input type="text" name="adresse"  class="form-control" value="{{old('adresse')}}">
              <span class="text-danger">@error('adresse'){{$message}} @enderror</span>
            </div>
            <div  class="form-group" style="width:70%; margin:auto;">
              <label for="telephone" class="d-flex align-items-start justify-content-start">telephone</label>
              <input type="text" name="telephone"  class="form-control" value="{{old('telephone')}}">
              <span class="text-danger">@error('telephone'){{$message}} @enderror</span>
            </div>
            <div class="row">
                <div class="col">
                <div class="form-group" >
                            <label for="category" class="d-flex align-items-start justify-content-start">categorie</label>
                            <select class="form-select" aria-label="Default select example" id="category" name="category">
                              @foreach($categories as $category)
                            
                              <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                              </select>
                            <span class="text-danger">@error('category'){{$message}} @enderror</span>
                          </div>
                </div>
                <div class="col">
                <div class="form-group">
                            <label for="domaine" class="d-flex align-items-start justify-content-start">domaine</label>
                            <select class="form-select" aria-label="Default select example" name="domaine" id="domaine" placeholder="domaine">
                            @foreach($domaines as $domaine)
                              <option value="{{$domaine->id}}">{{$domaine->name}}</option>
                              @endforeach
                              </select>
                            <span class="text-danger">@error('domaine'){{$message}} @enderror</span>
                          </div>
                </div>
              </div>  
          
            <div class="form-group" style="width:70%; margin:auto;">
              <label for="password" class="d-flex align-items-start justify-content-start">password</label>
              <input type="password" name="password"  class="form-control" value="{{old('password')}}">
              <span class="text-danger">@error('password'){{$message}} @enderror</span>
            </div>
            <div class="form-group" style="width:70%; margin:auto;">
              <label for="resetpassword" class="d-flex align-items-start justify-content-start">confirmer password</label>
              <input type="password" name="resetpassword"  class="form-control" value="{{old('resetpassword')}}">
              <span class="text-danger">@error('resetpassword'){{$message}} @enderror</span>
            </div>
            <div class="form-group">
              <input type="submit" value="s'inscrire" class="btn btn-primary mt-2">
            </div>
        <div class="text-end"><a href="{{ route('entreprise.login') }}"><strong>j'ai déjà un compte</strong></a></div>
              </form>
          
      </div>
    
    </div>




<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>