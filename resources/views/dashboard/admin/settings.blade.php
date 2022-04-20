<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>changement de mot de passe</title>
</head>
<body style="background-color:#a0a1ff;">
<div class=" text-center mt-5 pt-5" style="width:500px; margin:auto; margin-top: 20px; margin-bottom: 20px;border-radius:20px; border: 2px solid black ;padding : 8px;">

        <div class="container">
       
            
                   
                <form action="{{ route('admin.changepassword') }}" method="post" style="border:1px solid black;border-radius:15px 30px;padding: 15px 30px;background-color:blanchedalmond;">
                <h4>paramètres</h4>
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
                
                </div>
                <div class="form-group" style="display:none;">
                <label for="email">password</label>
                <div class="d-flex align-items-center justify-content-center">
                <input type="text" name="email"  class="form-control w-75" value="{{auth::guard('admin')->user()->email}}" style="border-radius:20px;"> 
                </div>
                </div>
                <div class="form-group">
                <label for="password">password</label>
                <div class="d-flex align-items-center justify-content-center">
                <input type="password" name="password"  class="form-control w-75" value="{{old('password')}}" style="border-radius:20px;"> 
                </div>
                <span class="text-danger">@error('password'){{$message}} @enderror</span class="text-danger">
                </div>
                <div class="form-group">
                <label for="newpassword">nouveau password</label>
                <div class="d-flex align-items-center justify-content-center">
                <input type="password" name="newpassword"  class="form-control  w-75" value="{{old('newpassword')}}" style="border-radius:20px;">
                </div>
                <span class="text-danger">@error('newpassword'){{$message}} @enderror</span class="text-danger">
                </div>
                <div class="form-group">
                <label for="confirmerpassword">confirmer nouveau password</label>
                <div class="d-flex align-items-center justify-content-center">
                <input type="password" name="confirmerpassword"  class="form-control w-75" value="{{old('confirmerpassword')}}" style="border-radius:20px;">
                </div>
                <span class="text-danger">@error('confirmerpassword'){{$message}} @enderror</span class="text-danger">
                </div>
                <div class="form-group">
                <input type="submit" value="modifier" class="btn btn-primary mt-2">
                </div>
            
                            </form>
             </div>
                
  </div>



<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>