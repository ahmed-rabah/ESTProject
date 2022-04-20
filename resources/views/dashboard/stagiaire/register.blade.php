<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>stagiaire register</title>
</head>
<body style="background-color:#a0a1ff;">
<div class=" text-center d-flex align-items-center justify-content-center" style="width:500px; margin:auto; margin-top: 20px; margin-bottom: 20px;">

        <div class="container">
       
            
                   
                <form action="{{ route('stagiaire.create') }}" method="post" style="border:1px solid black;border-radius:30px;padding: 15px 30px;background-color:blanchedalmond;">
                <h4>stagiaire register</h4>
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
        <label for="name">nom</label>
          <input type="text" name="name"  class="form-control" value="{{old('name')}}">
          <span class="text-danger">@error('name'){{$message}} @enderror</span class="text-danger" class="text-danger">
         </div>
         <div class="form-group">
        <label for="prenom">prenom</label>
          <input type="text" name="prenom"  class="form-control" value="{{old('prenom')}}">
          <span class="text-danger">@error('prenom'){{$message}} @enderror</span class="text-danger">
         </div>
         <div class="row">
              <div class="col">
              <div class="form-group"> 
                    <label for="dateN">date de naissance</label>
                      <input type="date" name="dateN"  class="form-control" value="{{old('dateN')}}">
                      <span class="text-danger">@error('dateN'){{$message}} @enderror</span class="text-danger">
                    </div>
              </div>
              <div class="col">
              <div class="form-group">
                    <label for="CIN">CIN</label>
                      <input type="text" name="CIN"  class="form-control" value="{{old('CIN')}}">
                      <span class="text-danger">@error('CIN'){{$message}} @enderror</span class="text-danger">
                    </div>
              </div>
         </div>
         
        
         <div  class="form-group">
          <label for="email">email</label>
          <input type="text" name="email"  class="form-control" value="{{old('email')}}">
          <span class="text-danger">@error('email'){{$message}} @enderror</span class="text-danger">
         </div> 
         <div  class="form-group">
          <label for="phone">phone</label>
          <input type="text" name="phone"  class="form-control" value="{{old('phone')}}">
          <span class="text-danger">@error('phone'){{$message}} @enderror</span class="text-danger">
         </div>
         <div class="form-group">
             <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gendre" id="masculin" value="masculin" checked>
                  <label class="form-check-label" for="masculin">masculin</label>
            </div>
            <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gendre" id="feminin" value="feminin">
                  <label class="form-check-label" for="feminin">feminin</label>
            </div>
                      
        </div>
         <div class="form-group">
          <label for="password">password</label>
          <input type="password" name="password"  class="form-control" value="{{old('password')}}">
          <span class="text-danger">@error('password'){{$message}} @enderror</span class="text-danger">
        </div>
        <div class="form-group">
          <label for="resetpassword">password X2</label>
          <input type="password" name="resetpassword"  class="form-control" value="{{old('resetpassword')}}">
          <span class="text-danger">@error('resetpassword'){{$message}} @enderror</span class="text-danger">
        </div>
        <div class="form-group">
          <input type="submit" value="s'inscrire" class="btn btn-primary mt-2">
        </div>
        <div class="text-end"><a href="{{ route('stagiaire.login') }}"><strong>j'ai déjà un compte</strong></a></div>

                    </form>
        </div>
                
  </div>



<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>