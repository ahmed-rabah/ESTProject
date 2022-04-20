<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <title>Document</title>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h4>user login</h4>
                    <form action=" {{route('user.check')}}" method="post">
                    @if(Session::get('success'))
                    {{Session::get('success')}}
                    @endif
                    @if(Session::get('fail'))
                    {{Session::get('fail')}}
                    @endif
    @csrf
        <div class="form-group">
          <label for="email">email</label>
          <input type="text" name="email"  class="form-control" value="{{old('email')}}">
          <span>@error('email'){{$message}} @enderror</span>
         </div>
         <div class="form-group">
          <label for="password">password</label>
          <input type="password" name="password"  class="form-control" value="{{old('password')}}">
          <span>@error('password'){{$message}} @enderror</span>
        </div>
        <div class="form-group">
          <input type="submit" value="se connecter" class="btn btn-primary">
        </div>

                    </form>
                </div>
                
        </div>



<script src="{{ asset('app.js') }}"></script>
</body>
</html>