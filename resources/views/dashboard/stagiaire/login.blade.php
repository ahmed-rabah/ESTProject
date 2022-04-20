<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>stagiaire login</title>
</head>
<body style="background-color:#a0a1ff;">
  
<div class=" text-center d-flex align-items-center justify-content-center" style="height: 550px;width:500px; margin:auto;">
           
           

        <div class="container">
            
                    
      <form action=" {{route('stagiaire.check')}}" method="post" style="border:1px solid black;border-radius:30px;background-color:blanchedalmond;padding: 35px 25px;">
          <h4>stagiaire login</h4>
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
        <div class="form-group" >
          <label for="email">email</label>
          <input type="text" name="email"  class="form-control" value="{{old('email')}}">
          <span class="text-danger">@error('email'){{$message}} @enderror</span>
         </div>
         <div class="form-group">
          <label for="password">password</label>
          <input type="password" name="password"  class="form-control" value="{{old('password')}}">
          <span class="text-danger">@error('password'){{$message}} @enderror</span>
        </div>
        <div class="form-group pt-3">
          <input type="submit" value="se connecter" class="btn btn-primary">
        </div>
        <div class="text-end"><a href="{{ route('stagiaire.register') }}"><strong>créer un compte stagiaire</strong></a></div>

                    </form>
               
                
        </div>

        </div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>