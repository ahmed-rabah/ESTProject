<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>admin register</title>
</head>
<body>
<div class=" text-center d-flex align-items-center justify-content-center" style="height: 550px;width:500px; margin:auto;">
      
        <div class="container">
           
                    <h4>admin register</h4>
                <form action="{{ route('admin.create') }}" method="post">
                @if(Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{Session::get('success')}}
                    </div> 
                    @endif
                    @if(Session::get('fail'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      {{Session::get('fail')}}
                    </div> 
                    @endif
                    
        @csrf 
        <div class="form-group">
        <label for="name">name</label>
          <input type="text" name="name"  class="form-control" value="{{old('name')}}">
          <span>@error('name'){{$message}} @enderror</span>
         </div>
         <div  class="form-group">
          <label for="email">email</label>
          <input type="text" name="email"  class="form-control" value="{{old('email')}}">
          <span>@error('email'){{$message}} @enderror</span>
         </div> 
         <div  class="form-group">
          <label for="phone">phone</label>
          <input type="text" name="phone"  class="form-control" value="{{old('phone')}}">
          <span>@error('phone'){{$message}} @enderror</span>
         </div>
         <div class="form-group">
          <label for="password">password</label>
          <input type="password" name="password"  class="form-control" value="{{old('password')}}">
          <span>@error('password'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
          <label for="resetpassword">password X2</label>
          <input type="password" name="resetpassword"  class="form-control" value="{{old('resetpassword')}}">
          <span>@error('resetpassword'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
          <input type="submit" value="se connecter" class="btn btn-primary">
        </div>

                    </form>
                
</div>

<script src="{{ asset('app.js') }}"></script>
</body>
</html>